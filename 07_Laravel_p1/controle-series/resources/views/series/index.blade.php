@extends('layout')

@section('header')
Melhores Séries
@endsection

@section('content')
@if(!empty($message))
    <div class="alert alert-success">
        {{$message}}    
    </div>
@endif


<a href="{{route('create_series')}}" class="btn btn-info mb-2">Adicionar Série</a>
<ul class="list-group">
    @foreach( $series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{$serie->name;}} - {{$serie->network;}}
            <span>
                <!-- ddslashes() para evitar conflitos com nomes de séries que incluam o caractere ': -->
                <form action="/series/{{$serie->id}}" method="post"
                onsubmit="return confirm('Certeza que quer remover a série {{addslashes($serie->name)}}?')">
                @csrf 
                <!-- Alteração do método da requisição origiral de post para DELETE, para manter o padrão Laravel -->
                <!-- Blade cria um input hidden e a cada requisição, verifica sua existência, para mandar a requisição para a rota correta. -->
                @method('DELETE')
                <button class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                </form>
            </span>
        </li>
     @endforeach
</ul>
@endsection
<!-- <body>
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Melhores Séries</h1>
            <p class="lead">Gerenciamento das melhores séries já vistas por moi.</p>
            <hr class="my-4">
            <p>Nome-Produdora</p>
        </div>

    </div>
</body>
</html> -->