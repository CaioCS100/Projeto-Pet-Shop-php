@extends('template.templateMenubar')

@push('css',' <link rel="stylesheet" href="' .asset('css/estilo_Tela_Procurar_Clientes.css'). '" ')

@section('Menu')

    @if(session('editado'))
        <div class="alert alert-success temporario" role="alert">
            <strong>Usuário Alterado com Sucesso!</strong>
        </div>
    @endif

    @if(session('excluido'))
        <div class="alert alert-success temporario" role="alert">
            <strong>Usuário Excluido com Sucesso!</strong>
        </div>
    @endif

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
                <tr onclick="window.location.href='{{ route('showCliente',['id' => $dadostabela->id]) }}'">
                    <th scope="row">{{$dadostabela['id']}}</th>
                    <td> {{$dadostabela['nome']}} </td>
                    <td> {{$dadostabela['telefone']}} </td>
                    <td> {{$dadostabela['data_de_nascimento']}} </td>
                    <td> {{$dadostabela['observacao_cliente']}} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection('Menu')