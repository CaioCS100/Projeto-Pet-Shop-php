@extends('template.templateMenubar')

@push('css',' <link rel="stylesheet" href="' .asset('css/estilo_Tela_Procurar_Clientes.css'). '" ')

@section('Menu')

    @if(session('editado'))
        <div class="alert alert-success temporario" role="alert">
            <strong>Animal Alterado com Sucesso!</strong>
        </div>
    @endif

    @if(session('excluido'))
        <div class="alert alert-success temporario" role="alert">
            <strong>Animal Excluido com Sucesso!</strong>
        </div>
    @endif

    <table class="table table-hover" id="tabela">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome do dono</th>
            <th scope="col">Nome do Pet</th>
            <th scope="col">Espécie</th>
            <th scope="col">Raça</th>
            <th scope="col">Data de Nascimento</th>
            <th scope="col">Peso</th>
            <th scope="col">Sexo</th>
            <th scope="col">Identificação/Cor/Pelagem</th>
        </tr>
        </thead>
        <tbody>
            @foreach($animais as $dadostabela)
                <tr onclick="window.location.href='{{ route('showAnimal',['id' => $dadostabela->id]) }}'">
                    <th scope="row">{{$dadostabela->id}}</th>
                    <td> {{$dadostabela->nome}} </td>
                    <td> {{$dadostabela->nome_pet}} </td>
                    <td> {{$dadostabela->nome_especie}} </td>
                    <td> {{$dadostabela->nome_raca}} </td>
                    <td> {{$dadostabela->data_de_nascimento_pet}} </td>
                    <td> {{$dadostabela->peso}} </td>
                    <td> {{$dadostabela->sexo}} </td>
                    <td> {{$dadostabela->cor}} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection('Menu')