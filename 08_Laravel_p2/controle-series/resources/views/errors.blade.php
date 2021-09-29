@if ($errors->any()) <!-- Se existir algum erro, exibir o <div> abaixo -->
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif