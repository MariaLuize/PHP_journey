<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    // Padrão de nome dos métodos: https://laravel.com/docs/8.x/controllers#resource-controllers
    public function index(Request $request)
    {

        // /* Todas as ações dos controllers, isto é, todos os métodos, possuem como parâmetro um Request $request (específico Laravel) */
        // echo $request->url(). '<br>'; //Retorna a url como vista no navegador. Ex: http://127.0.0.1:8000/series?param=12345 printa só  http://127.0.0.1:8000/series
        // var_dump($request->query()). '<br>'; //Retorna todos os dados da query string. Ex: http://127.0.0.1:8000/series?param=12345 printa só  array(1) { ["param"]=> string(5) "12345" }
        // echo $request->query('param'). '<br>'; //Retorna o valor de um parâmetro especifico presente na url.  Ex: http://127.0.0.1:8000/series?param=12345 printa só 12345

        $series=[
            "Doctor Who",
            "Bojack Horseman",
            "Community"
        ];
        
        /** Direcionamento pra view correta. Com essa sintaxe, estamos indicando que ela deve procurar na pasta "Series" 
         * um arquivo chamado "index", sem que seja necessário informar a extensão. Na função view, podemos passar um segundo parâmetro
         * que envia todas as variáveis necessárias para o arquivo de view (index.php). Tal parâmetro pode ser passado em forma de um array associativo
         * tipo: ['series' => $series,]. Porém, a função PHP compact() permite que, caso o noma da variável no Controller e no árquivo de view seja o mesmo
         * podemos apenas declaras como: compact('series'), que é o equivalente de ['series' => $series,] */
        return view('series.index',compact('series'));
    }
    
    public function create()
    {
        return view('series.create');
    }
}