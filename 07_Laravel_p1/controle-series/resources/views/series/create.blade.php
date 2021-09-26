@extends('layout')

@section('header')
Adicionar Série
@endsection

@section('content')
<form method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Nome da Série</label>
        <input type="text" class="form-control" id="name" name='name' placeholder="Doctor Who">
        <small class="form-text text-muted">Nome da série</small>
    </div>

    <div class="form-group">
        <label for="name">Network Original da Série</label>
        <input type="text" class="form-control" id="network" name='network' placeholder="BBC">
    </div>
    <button type="submit" class="btn btn-outline-primary">Adicionar <i class="fas fa-space-shuttle"></i></button>
</form>
@endsection
