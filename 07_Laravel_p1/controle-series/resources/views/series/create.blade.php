@extends('layout')

@section('header')
Adicionar Série
@endsection

@section('content')
<form method="POST">
            <div class="form-group">
                <label for="name">Série</label>
                <input type="text" class="form-control" id="name" name='name' placeholder="Doctor Who">
                <small id="emailHelp" class="form-text text-muted">Nome da série - Produtora</small>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>
@endsection
