<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash};
use App\Models\User;

class RegistryController extends Controller
{
    // Action para exibir formulário de registro de novo usuário
    public function create ()
    {
        return view('registry.create');

    }

    // Action para salvar os dados do usuário registrado
    public function store(Request $request)
    {
        // Pegar tudo do request, exceto o token, enviado via  @csrf
        $data               = $request->except('_token');
        $data['password']   = Hash::make($data['password']); //Através da class Hash, tivemos acesso ao método make, que gera o hash da senha passada por parâmetro
        $user               = User::create($data);

        Auth::login($user);

        return redirect()->route('series.index');
    }
}
