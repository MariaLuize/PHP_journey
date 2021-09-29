@extends('layout')

@section('header')
Temporadas de {{$serieName}}
@endsection

@section('content')
@includeWhen(!empty('message'),'message-alert',['message'=>$message])

<ul class="list-group">
    @foreach( $seasons as $season)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="/seasons/{{$season->id}}/episodes">
                Temporada {{$season->number;}}
            </a>
            <span class="badge badge-pill badge-light">
            <!-- $season->episodes->count(), episodes é uma colação do Eloquent, que contem vários episodes, o count() conta o conteúdo quantitativo presente na coleção episodes -->
            <!-- https://laravel.com/docs/8.x/collections     -->
                {{$season->getWatchedEpisodes()->count()}} / {{$season->episodes->count()}}
            </span>
        </li>
     @endforeach
</ul>
@endsection