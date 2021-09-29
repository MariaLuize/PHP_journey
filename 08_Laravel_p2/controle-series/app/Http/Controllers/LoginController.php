<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        // Só exibir formulário de login
        return view('login.index');
    }


/** O Laravel cria a variável $errors automaticamente para nós, e caso haja 
 * algum erro na resposta atual, o método $errors->all() retornará uma lista com todos eles. Para exibí-los, então, 
 * basta realizar um loop no retorno deste método. Para mais detalhes, https://laravel.com/docs/5.8/validation#quick-displaying-the-validation-errors */

    public function login (Request $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return redirect()
                ->back()
                ->withErrors('Usuário e/ou senha incorretos');
        }
        return redirect()->route('series.index');
    }
}
