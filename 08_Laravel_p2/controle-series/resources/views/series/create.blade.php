@extends('layout')

@section('header')
Adicionar Série
@endsection

@section('content')

@include('errors', ['errors' => $errors])

<form method="POST">
    @csrf
    <div class="row">
        <div class="col col-4">
            <label for="name">Nome da Série</label>
            <input type="text" class="form-control" id="name" name='name' placeholder="Doctor Who">
            <!-- <small class="form-text text-muted">Nome da série</small> -->
        </div>

        <div class="col col-4">
            <label for="network">Network Original da Série</label>
            <input type="text" class="form-control" id="network" name='network' placeholder="BBC">
        </div>

        <div class="col col-2">
            <label for="qty_season"s>No. de Temporadas</label>
            <input type="number" class="form-control" id="qty_seasons" name='qty_seasons' placeholder="1">
        </div>

        <div class="col col-2">
            <label for="ep_per_season">Ep. por temporada</label>
            <input type="number" class="form-control" id="ep_per_season" name='ep_per_season' placeholder="13">
        </div>
    </div>

    <button type="submit" class="btn btn-outline-primary mt-2">Adicionar <i class="fas fa-space-shuttle"></i></button>
</form>
@endsection
