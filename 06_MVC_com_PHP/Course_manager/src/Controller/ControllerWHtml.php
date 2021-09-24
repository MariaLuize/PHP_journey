<?php
namespace Alura\Cursos\Controller;


abstract class ControllerWHtml
{
    public function renderizaHtml(string  $pathTemplate, array $data):string
    {
        extract($data); // A função extract(..) recebe um array associativo e define variáveis para cada chave
        
        /**
         * A função ob_start(output buffer start) ativa o armazenamento no buffer de saída (Output Buffer), e a 
         * função ob_get_clean busca os dados que estão nesse buffer e depois o limpa. Com isso conseguimos salvar os dados que 
         * seriam enviados para o navegador em uma variável. Para ver mais funções que controlam a saída você 
         * pode conferir a documentação: https://www.php.net/manual/en/intro.outcontrol.php
         * 
         */
        ob_start();

        require __DIR__.'/../../view/'. $pathTemplate;
        $html = ob_get_clean();

        return $html; // Depois de buscarmos o conteúdo do buffer, podemos retornar a string do $html para a classe que está chamando o método
    }
}