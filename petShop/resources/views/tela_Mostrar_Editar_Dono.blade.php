@extends('template.templateMenuBar')
    @push('css', '<link rel="stylesheet" href="' .asset('css/estilo_Tela_Cadastro_Dono.css'). '"/>')

      @section('Menu')

     

      @if(session('cadastrado'))
        <div class="alert alert-success" role="alert" id="temporario">
            <strong>Usuário Alterado com Sucesso!</strong>
        </div>
      @endif

        <form method="POST" action=" {{ route('salvarDono') }} " enctype="multipart/form-data">
            {{ csrf_field() }}
            <fieldset>
                <legend id="titulo_Fieldset"> Mostrar de Cliente </legend>
                  <div id="espaco">

                      @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                          <strong>Erro ao cadastrar Dono!</strong>
                          @foreach($errors->all() as $erro)
                            <p> {{ $erro }} </p>
                          @endforeach
                        </div>
                      @endif
                    <div class="form-row">
                        <div class="form-group col-md-5">
                          <label for="idNome">Nome Completo<span class="asterisco">*</span>:</label>
                          <input type="text" class="form-control" id="idNome" name="nome" placeholder="Digite seu nome completo" value="{{old('nome', $cliente['nome'])}}" disabled>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="idCPF">CPF<span class="asterisco">*</span>:</label>
                          <input type="text" class="form-control" id="idCPF" name="cpf" placeholder="Digite seu CPF" value="{{old('cpf', $cliente['cpf'])}}" disabled>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="idData">Data de Nascimento<span class="asterisco">*</span>:</label>
                          <input type="date" class="form-control" id="idData" name="data" value="{{old('data',$cliente['data_de_nascimento'])}}" disabled>
                        </div>
                    </div>

                    <div class="form-row">
                            <div class="form-group col-md-3">
                              <label for="idCEP">CEP<span class="asterisco">*</span>:</label>
                              <input type="text" class="form-control" id="idCEP" name="cep" placeholder="Digite seu CEP" value="{{old('cep',$cliente['cep'])}}" disabled>
                            </div>
                            <div class="form-group col-md-4">
                              <label for="idTelefone">Telefone<span class="asterisco">*</span>:</label>
                              <input type="text" class="form-control" id="idTelefone" name="telefone" placeholder="Digite seu Telefone" value="{{old('telefone',$cliente['telefone'])}}" disabled>
                            </div>
                            <div class="form-group col-md-5">
                                  <label for="idEmail">Email<span class="asterisco">*</span>:</label>
                                  <input type="email" class="form-control" id="idEmail" name="email" placeholder="Digite seu E-mail" value="{{old('email',$cliente['email'])}}" disabled>
                            </div>
                    </div>

                    <div class="form-row">
                          <div class="form-group col-md-6">
                                <label for="idEndereco">Enderenço:</label>
                                <input type="text" class="form-control" id="idEndereco" name="endereco" placeholder="Digite seu Endereço" value="{{old('endereco',$cliente['endereco'])}}" disabled>
                          </div>
                          <div class="form-group col-md-6">
                                <label for="idBairro">Bairro:</label>
                                <input type="text" class="form-control" id="idBairro" name="bairro" placeholder="Digite seu Bairro" value="{{old('bairro',$cliente['bairro'])}}" disabled>
                          </div>
                    </div>
            
                    <div class="form-row">
                      <div class="form-group col-md-5">
                        <label for="idCidade">Cidade:</label>
                        <input type="text" class="form-control" id="idCidade" name="cidade" placeholder="Digite sua cidade" value="{{old('cidade',$cliente['cidade'])}}" disabled>
                      </div>
                      <div class="form-group col-md-2">
                        <label for="idUf">UF:</label>
                        <select id="idUf" name="uf" class="form-control" disabled>
                          @foreach($allUfs as $allUf)
                          <option {{ ($cliente['uf'] == $allUf ? 'selected' : '') }}> {{$allUf}} </option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group col-md-5">
                          <label for="idComplemento">Complemento:</label>
                          <input type="text" class="form-control" id="idComplemento" name="complemento" placeholder="Digite o complemento" value="{{old('complemento',$cliente['complemento'])}}" disabled>
                      </div>
                    </div>

                    <div class="form-row">

                      <div class="form-group col-md-5">
                        <label for="idObs"><strong> Observações do cliente:</strong></label> <br/>
                        <textarea id="idObs" name="obs" rows="5" cols="100" disabled>{{old('obs',$cliente['observacao_cliente'])}} </textarea> <br/>
                      </div>
                      <div id="mostrarImagem" class="form-group col-md-4">
                                <div id="image-holder"></div>
                                <input type = "file" value = "Imagem" id="fileUpload" name="imagem" accept=".jpg, .jpeg, .png" disabled/>
                      </div>
                    </div>

                    <button type="button" class="btn btn-primary" id="botao-editar" onclick="ativarCampos();ativarMascaras();" data-toggle="tooltip" data-placement="top" title="Novo Cadastro"></button>
                    <button type="submit" class="btn btn-primary" id="botao-salvar" data-toggle="tooltip" data-placement="top" title="Salvar" disabled></button>
                    <button type="button" class="btn btn-primary" id="botao-excluir" onclick="window.location.href='{{ route('procurarDono')}}'" data-toggle="tooltip" data-placement="top" title="Procurar Clientes"></button>
                    <button type="button" class="btn btn-primary" id="botao-voltar" onclick="window.location.href='{{ route('paginaPrincipal')}}'" data-toggle="tooltip" data-placement="top" title="Voltar"></button>
                  </div>
            </fieldset>
          </form>

            @endsection
       
              @push('javascript', '<script src="' . asset('js/jquery-3.2.1.min.js'). '"> </script>')
              @push('javascript', '<script type="text/javascript" src="' . asset('js/CadastroDono.js'). '"> </script>')
              @push('javascript', '<script type="text/javascript" src="' .asset('js/JFileChooser.js'). '"> </script>')
              @push('javascript', '<script type="text/javascript" src="' .asset('js/jquery.mask.js'). '"> </script>')
              
              
              
              
    