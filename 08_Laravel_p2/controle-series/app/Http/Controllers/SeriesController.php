<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Serie,Season,Episode};
use App\Http\Requests\SeriesFormRequest;
use App\Services\{SeriesCreator, SeriesRemover};

class SeriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // Padrão de nome dos métodos: https://laravel.com/docs/8.x/controllers#resource-controllers
    public function index(Request $request)
    {

        // /* Todas as ações dos controllers, isto é, todos os métodos, possuem como parâmetro um Request $request (específico Laravel) */
        // echo $request->url(). '<br>'; //Retorna a url como vista no navegador. Ex: http://127.0.0.1:8000/series?param=12345 printa só  http://127.0.0.1:8000/series
        // var_dump($request->query()). '<br>'; //Retorna todos os dados da query string. Ex: http://127.0.0.1:8000/series?param=12345 printa só  array(1) { ["param"]=> string(5) "12345" }
        // echo $request->query('param'). '<br>'; //Retorna o valor de um parâmetro especifico presente na url.  Ex: http://127.0.0.1:8000/series?param=12345 printa só 12345

        // $series = Serie::all(); //busca todas as séries do banco
        $series = Serie::query()->orderBy('name')->get(); // ordena as séries buscadas no banco pelo seu nome (em ordem crescente)
        
        // Mensagem sobre série que acabou de ser criada na área de criação de séries, tal info foi armazenada em uma section
        $message = $request->session()->get(key: 'message');
        $request->session()->remove('message');
        
        /** Direcionamento pra view correta. Com essa sintaxe, estamos indicando que ela deve procurar na pasta "Series" 
         * um arquivo chamado "index", sem que seja necessário informar a extensão. Na função view, podemos passar um segundo parâmetro
         * que envia todas as variáveis necessárias para o arquivo de view (index.php). Tal parâmetro pode ser passado em forma de um array associativo
         * tipo: ['series' => $series,]. Porém, a função PHP compact() permite que, caso o noma da variável no Controller e no árquivo de view seja o mesmo
         * podemos apenas declaras como: compact('series'), que é o equivalente de ['series' => $series,] */
        return view('series.index',compact('series','message'));
        // return view('series.index',);
    }
    
    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, SeriesCreator $seriesCreator) // SeriesFormRequest referente as regras de validação para a inserção de séries no banco
    {

        /** AGORA AS REGRAS DE VALIDAÇÃO ESTÃO NO ARQUIVO \app\Http\Requests\SeriesFormRequest.php */
        
        /** AGORA A CRIAÇÃO DAS SÉRIES ESTÁ NO ARQUIVO \app\Services\SeriesCreator.php */
        $serie = $seriesCreator->createSerie(
            $request->name, 
            $request->network, 
            $request->qty_seasons, 
            $request->ep_per_season);
            

        // Quardar informações referentes a série recem criada em uma session, e depois redirecionar
        $request->session()
            ->flash( // Uma Flash Message é uma mensagem na sessão HTTP, que durará apenas uma requisição, ou seja, será excluída da sessão na requisição seguinte.
                'message',
                "Série, identificada por {$serie->id} com suas temporadas e episódios, criada: {$serie->name}"
            );

            return redirect()->route('series.index');

    }

    public function destroy(Request $request, SeriesRemover $seriesRemover)
    {

        $seriesName = $seriesRemover->removeSerie($request->id);

                
        $request->session()
        ->flash( // Uma Flash Message é uma mensagem na sessão HTTP, que durará apenas uma requisição, ou seja, será excluída da sessão na requisição seguinte.
            'message',
            "Série {$seriesName} removida com sucesso"
        );
        
        return redirect()->route('series.index');
    }

    public function update (int $id, Request $request)
    {
        $newName        = $request->name; // O campo name é referencite ao campo de mesmo nome presente no FormData enviado ( formData.append('name', nameSerie))
        $newNetwork     = $request->network;
        // $serie          = Serie::find($request->id);

        /**
         * No nosso Controller, estamos buscando o id a partir da requisição. Porém, se já estamos 
         * definindo um atributo na rota, podemos pegá-lo diretamente com um parâmetro do método, 
         * bastando definirmos como nome dessa parâmetro o mesmo nome que figura na rota.
         */
        $serie          = Serie::find($id);
        $serie->name    = $newName;
        $serie->network = $newNetwork;
        $serie->save(); // Método para salvar modificações em um registro no DB
    }
}   