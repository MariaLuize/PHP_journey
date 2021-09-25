@extends('layout')

@section('header')
Melhores Séries
@endsection

@section('content')
<a href="/series/create" class="btn btn-info mb-2">Adicionar Série</a>
<ul class="list-group">
    @foreach( $series as $serie)
        <li class="list-group-item"><?=$serie?></li>
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