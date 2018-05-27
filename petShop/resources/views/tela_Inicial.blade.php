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
            <div class="alert alert-danger" role="alert" id="temporario">
                <strong>Login ou senha errada!</strong>
            </div>
        @endif
    
        
        <form method="POST" action="{{ route('validarLogin') }}">
            {{ csrf_field() }}
           <label for="idLogin" class="tamanho">Login:</label>
            <input type="text" placeholder="Digite seu login" name="cTexto" id="idLogin" class="tamanhoCampo"/> <br/>
            <label for="idSenha" class="tamanho"> Senha: </label>
            <input type="password" placeholder="Digite sua senha" name="cSenha" id="idSenha" class="tamanhoCampo"/> <br/>
            <input type="submit" value="Acessar" class="botao"/> <br/> <br/> <br/>
            
        </form>

    </header>
    
</body>
</html>