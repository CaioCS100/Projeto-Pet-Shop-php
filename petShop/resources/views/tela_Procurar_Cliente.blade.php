@extends('template.templateMenubar')

@push('css',' <link rel="stylesheet" href="' .asset('css/estilo_Tela_Procurar_Clientes.css'). '" ')

@section('Menu')
    <table class="table table-hover" id="tabela">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Telefone</th>
            <th scope="col">Data de Nascimento</th>
            <th scope="col">Descrição</th>
        </tr>
        </thead>
        <tbody>
            @foreach($cliente as $dadostabela)
                <tr>
                    <th scope="row" onclick="alert('selecionar o id para mostrar esse valor');">{{$dadostabela['id']}}</th>
                    <td onclick="alert('selecionar o id para mostrar esse valor');"> {{$dadostabela['nome']}} </td>
                    <td onclick="alert('selecionar o id para mostrar esse valor');"> {{$dadostabela['telefone']}} </td>
                    <td onclick="alert('selecionar o id para mostrar esse valor');"> {{$dadostabela['data_de_nascimento']}} </td>
                    <td onclick="alert('selecionar o id para mostrar esse valor');"> {{$dadostabela['observacao_cliente']}} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection('Menu')