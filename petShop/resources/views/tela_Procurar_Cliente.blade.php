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
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>descrição</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td>descrição</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Larry the Bird</td>
            <td> alguma coisa</td>
            <td>@twitter</td>
            <td>descrição</td>
        </tr>
        </tbody>
    </table>
@endsection('Menu')