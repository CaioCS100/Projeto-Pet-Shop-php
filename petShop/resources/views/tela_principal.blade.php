<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pet&Shop</title>
    <link href="{{asset('css/estilo_Tela_Principal.css')}}" rel="stylesheet" type="text/css" />
</head>
<body>
        <!-- Na parte do id parte-superior vai ficar os ul e as opções de ir para outra tela  -->
        <nav class="menu-container"> 

            <ul class="menu clearfix">
                    <li><a href="#">Caixa</a> 
                        <ul class="sub-menu clearfix" id="comprimento-box-caixa">
                            <li><a href="{{ route('abrirCaixa') }}">Abrir Caixa</a></li>
                        </ul>
                    </li>
                    <li><a href="#"> Donos </a>
                        <ul class="sub-menu clearfix" id="comprimento-box-dono">
                            <li><a href="{{ route('cadastrarDono') }}">Adicionar Novo Dono</a></li>
                            <li><a href="{{ route('procurarDono') }}">Procurar Dono</a></li>
                        </ul>
                    </li>
                    <li><a href="#"> Animais </a>
                        <ul class="sub-menu clearfix" id="comprimento-box-animal">
                            <li><a href="#">Adicionar Novo Animal</a></li>
                            <li><a href="#">Procurar Animal</a></li>
                        </ul>
                    </li>
                    <li><a href="#"> Produtos </a>
                        <ul class="sub-menu clearfix" id="comprimento-box-produto">
                            <li><a href="#">Adicionar Novo Produto</a></li>
                            <li><a href="#">Procurar Produto</a></li>
                        </ul>
                    </li>
                    <li><a href="#"> Serviços </a>
                        <ul class="sub-menu clearfix" id="comprimento-box-servico">
                            <li><a href="#">Adicionar Novo Serviço</a></li>
                            <li><a href="#">Procurar Serviço</a></li>
                        </ul>
                    </li>
                    <li><a href="#"> Funcionários </a>
                        <ul class="sub-menu clearfix">
                            <li><a href="#">Adicionar Novo Funcionário</a></li>
                            <li><a href="#">Procurar Funcionário</a></li>
                        </ul>
                    </li>
                    <li><a href="#"> Consulta </a>
                        <ul class="sub-menu clearfix" id="comprimento-box-consulta">
                            <li><a href="#">Nova Consulta</a></li>
                            <li><a href="#">Procurar Consulta</a></li>
                        </ul>
                    </li>
                    <li id="logout"><a href="#"> Logout </a></li>
            </ul>
        
        </nav>

        <!-- Na parte do id parte-inferior vai ficar uma imagem do cachorro em java -->

    <div id="parte-inferior-do-site">  </div>



</body>
</html>