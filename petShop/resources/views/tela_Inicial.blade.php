<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/estilo_Login.css')}}" rel="stylesheet" type="text/css">
    <title>Pet&Shop</title>
</head>
<body>

    <header> 

        <h1> PetShop & CIA </h1> 

        @if(session('invalido'))
        <div class="alert">
            <strong>Login ou senha errada!</strong>
        </div>
        @endif

        <form method="POST" action="{{ route('validarLogin') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
           <label for="idLogin" class="tamanho">Login:</label>
            <input type="text" placeholder="Digite seu login" name="cTexto" id="idLogin" class="tamanhoCampo"/> <br/>
            <label for="idSenha" class="tamanho"> Senha: </label>
            <input type="password" placeholder="Digite sua senha" name="cSenha" id="idSenha" class="tamanhoCampo"/> <br/>
            <input type="submit" value="Acessar" class="botao"/> <br/> <br/> <br/>
            <div id="mostrarImagem">
                <input type = "file" value = "Imagem" id="fileUpload" accept=".jpg, .jpeg, .png"/>
                <div id="image-holder" </div>
        </div>
        </form>

    </header>
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"> </script>
    <script type="text/javascript" src="{{asset('js/JFileChooser.js')}}"> </script>
</body>
</html>