@extends('layout')

@section('header')
Episódios da Temporada {{$season->number}}
@endsection

@section('content')

@includeWhen(!empty('message'),'message-alert',['message'=>$message])

<!-- necessitamos utilizar um form pois vamos enviar requisições de modificação  -->
<form action="/seasons/{{$seasonId}}/episodes/watch" method="post"> <!--Mandar as informações sobre todos os episódios a serem assistidos -->
     @csrf <!--token to Laravel para mandar informações via POST -->
    <ul class="list-group">
        @foreach( $episodes as $episode)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Episódio {{$episode->number;}}

                <!-- episodes[] indica que será enviado um array, contendo os valores de $episode->id --> 
                <input  type="checkbox" 
                        name="episodes[]"  
                        value ="{{$episode->id}}"
                        {{$episode->watched ? 'checked' : ''}} > <!-- Se episódios assistidos,marcar como checked -->
            </li>
        @endforeach
    </ul>

    <button class="btn btn-outline-primary mt-2 mb-2">Salvar</button>
</form>

@endsection
