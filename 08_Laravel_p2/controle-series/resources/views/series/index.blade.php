@extends('layout')

@section('header')
Melhores Séries
@endsection

@section('content')

@include('message-alert',['message'=>$message])

@auth
<a href="{{route('create_series')}}" class="btn btn-info mb-2">Adicionar Série</a>
@endauth

<ul class="list-group">
    @foreach( $series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span id="name-info-serie-{{$serie->id}}">{{$serie->name;}} - {{$serie->network;}}</span>
            <div class="input-group w-50" hidden id="input-name-info-serie-{{ $serie->id }}">
                <input type="text" class="form-control" id="name" value="{{ $serie->name }}">
                <input type="text" class="form-control" id="network" value="{{ $serie->network }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" onclick="editSerie({{ $serie->id}})">
                        <i class="fas fa-check"></i>
                    </button>
                    @csrf
                </div>
            </div>


            <span class=d-flex>

                @auth
                <button class="btn btn-outline-info btn-sm mr-2" onclick="toggleInput({{$serie->id}})">
                    <i class="fas fa-edit"></i>    
                </button>
                @endauth
                
                <!-- Visualizar as temporadas da série -->
                <a href="/series/{{$serie->id}}/seasons" class="btn btn-outline-info btn-sm mr-2">
                    <i class="fas fa-external-link-alt"></i>
                </a>

                @auth
                <!-- ddslashes() para evitar conflitos com nomes de séries que incluam o caractere ': -->
                <form action="/series/{{$serie->id}}" method="post"
                onsubmit="return confirm('Certeza que quer remover a série {{addslashes($serie->name)}}?')">
                @csrf 
                <!-- Alteração do método da requisição origiral de post para DELETE, para manter o padrão Laravel -->
                <!-- Blade cria um input hidden e a cada requisição, verifica sua existência, para mandar a requisição para a rota correta. -->
                @method('DELETE')
                <button class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                </form>
                @endauth
            </span>
        </li>
     @endforeach
</ul>

<script>
    function toggleInput(serieId) {
        const nomeSerieElement     = document.getElementById(`name-info-serie-${serieId}`); // Nome
        const inputSerieElement    = document.getElementById(`input-name-info-serie-${serieId}`); // Input
        if (nomeSerieElement.hasAttribute('hidden')) { // se o nome está escondido, tem o atributo hidden,
            nomeSerieElement.removeAttribute('hidden');
            inputSerieElement.hidden = true
        } else {
            inputSerieElement.removeAttribute('hidden');
            nomeSerieElement.hidden = true;
        }
    }

    function editSerie(serieId) {
        let formData       = new FormData();
        const nameSerie    = document.querySelector(`#input-name-info-serie-${serieId} > input[id="name"]`).value; //seleção do <input> presente dentro ("filho") do <div> cujo id é input-name-info-serie-${serieId}
        const networkSerie = document.querySelector(`#input-name-info-serie-${serieId} > input[id="network"]`).value

        // O botão para a edição do nome da série é identificado pelo atributo name=_token pelo navegador, cujo value corresponde ao valor do token
        // por exemplo:  <input type="hidden" name="_token" value="cDhPTQDjXM6zLCuwTu3CP618uwR1NuL96pITuTDa">
        const token = document.querySelector('input[name="_token"]').value; 
        
        formData.append('name', nameSerie) // Adiciona ao formData, o valor de nameSeries no campo 'name'
        formData.append('network', networkSerie) // Adiciona ao formData, o valor de nameSeries no campo 'name'
        formData.append('_token', token) // Adiciona ao formData, o valor do token que é gerado ao enviar uma requisição para editar o nome da série

        // enviar novo nome para uma rota do Laravel
        const url = `/series/${serieId}/editName`;
        //Fazer uma requisição para a url fetch, busca de uma informação em uma url
        fetch(url, {
            // informações da requisição
            body: formData, //dados de formulário
            method:'POST',
        }).then(() => { // Atualização do nome, JÁ SALVO, na página, sem a necessidade de recarregamento da página
            toggleInput(serieId);
            
            document.getElementById(`name-info-serie-${serieId}`).textContent = nameSerie +" - "+ networkSerie;  // Atualização do conteúdo do nome da série com o pego do input
        });
    }
</script>

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