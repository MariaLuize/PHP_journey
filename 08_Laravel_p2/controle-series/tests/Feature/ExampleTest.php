<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     * Está verificando se existe uma rota / na nossa aplicação. Porém, nossa rota principal é /series, 
     * e não criamos uma rota /. Portanto, para que esse teste não retorne um erro, ou alteramos a URL verificada para /, 
     * ou mudamos o status que deve ser retornado para 404:
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(404);
    }
}
