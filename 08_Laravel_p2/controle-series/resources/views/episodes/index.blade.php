@extends('layout')

@section('header')
Episódios
@endsection

@section('content')
<!-- necessitamos utilizar um form pois vamos enviar requisições de modificação  -->
<form action="post"> 
    <ul class="list-group">
        @foreach( $episodes as $episode)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Episódio {{$episode->number;}}
                <input type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            </li>
        @endforeach
    </ul>

    <button class="btn btn-primary mt-2 mb-2">Salvar</button>
</form>

@endsection
