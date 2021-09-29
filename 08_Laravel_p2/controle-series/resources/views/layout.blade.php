<!-- Sobre o Blade: https://laravel.com/docs/8.x/blade -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Séries</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e87f0f51e5.js" crossorigin="anonymous"></script>
</head>  
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 d-flex justify-content-between">
            <a class="navbar-brand" href="{{route('series.index')}}">Home</a>
            @auth
                <a href="/logout" class='text-danger'>Sair</a>
            @endauth

            @guest
            <a href="/login">Entrar</a>
            @endguest
            
        </nav>
        <div class="jumbotron">
            <h1 class="display-4">@yield('header')</h1>
        </div>
        @yield('content')
    </div>
</body>
</html>