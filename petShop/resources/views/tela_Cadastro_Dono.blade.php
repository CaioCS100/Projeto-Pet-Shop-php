@extends('template.templateMenuBar')
    @push('css', '<link rel="stylesheet" href="' .asset('css/estilo_Tela_Cadastro_Dono.css'). '"/>')

      @section('Menu')
        <form method="POST" action=" {{ route('salvarDono') }} " enctype="multipart/form-data">
            {{ csrf_field() }}
            <fieldset>
                <legend id="titulo_Fieldset"> Cadastro de Cliente </legend>

                  @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                      <strong>Erro!</strong>
                      @foreach($errors->all() as $erro)
                        <p> {{ $erro }} </p>
                      @endforeach
                    </div>
                  @endif
                <div class="form-row">
                    <div class="form-group col-md-5">
                      <label for="idNome">Nome Completo<span class="asterisco">*</span>:</label>
                      <input type="text" class="form-control" id="idNome" name="nome" placeholder="Digite seu nome completo" disabled>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="idCPF">CPF<span class="asterisco">*</span>:</label>
                      <input type="number" class="form-control" id="idCPF" name="cpf" placeholder="Digite seu CPF" disabled>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="idData">Data de Nascimento<span class="asterisco">*</span>:</label>
                      <input type="date" class="form-control" id="idData" name="data" disabled>
                    </div>
                </div>

                <div class="form-row">
                        <div class="form-group col-md-3">
                          <label for="idCEP">CEP<span class="asterisco">*</span>:</label>
                          <input type="number" class="form-control" id="idCEP" name="cep" placeholder="Digite seu CEP" disabled>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="idTelefone">Telefone<span class="asterisco">*</span>:</label>
                          <input type="number" class="form-control" id="idTelefone" name="telefone" placeholder="Digite seu Telefone" disabled>
                        </div>
                        <div class="form-group col-md-5">
                              <label for="idEmail">Email<span class="asterisco">*</span>:</label>
                              <input type="email" class="form-control" id="idEmail" name="email" placeholder="Digite seu E-mail" disabled>
                        </div>
                </div>

                <div class="form-row">
                      <div class="form-group col-md-6">
                            <label for="idEndereco">Enderenço:</label>
                            <input type="text" class="form-control" id="idEndereco" name="endereco" placeholder="Digite seu Endereço" disabled>
                      </div>
                      <div class="form-group col-md-6">
                            <label for="idBairro">Bairro:</label>
                            <input type="text" class="form-control" id="idBairro" name="bairro" placeholder="Digite seu Bairro" disabled>
                      </div>
                </div>
        
                <div class="form-row">
                  <div class="form-group col-md-5">
                    <label for="idCidade">Cidade:</label>
                    <input type="text" class="form-control" id="idCidade" name="cidade" placeholder="Digite sua cidade" disabled>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="idUf">UF:</label>
                    <select id="idUf" name="uf" class="form-control" disabled>
                      @foreach($ufs as $uf)
                      <option> {{$uf}} </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-5">
                      <label for="idComplemento">Complemento:</label>
                      <input type="text" class="form-control" id="idComplemento" name="complemento" placeholder="Digite o complemento" disabled>
                  </div>
                </div>

                <div class="form-row">

                  <div class="form-group col-md-5">
                    <label for="idObs"><strong> Observações do cliente:</strong></label> <br/>
                    <textarea id="idObs" name="obs" rows="5" cols="100" disabled> </textarea> <br/>
                  </div>
                  <div id="mostrarImagem" class="form-group col-md-4">
                            <div id="image-holder"></div>
                            <input type = "file" value = "Imagem" id="fileUpload" name="imagem" accept=".jpg, .jpeg, .png" disabled/>
                  </div>
                </div>

                <button type="button" class="btn btn-primary" id="botao-novo-cadastro" onclick="ativarCampos()" data-toggle="tooltip" data-placement="top" title="Novo Cadastro"></button>
                <button type="submit" class="btn btn-primary" id="botao-salvar" data-toggle="tooltip" data-placement="top" title="Salvar" disabled></button>
                <button type="button" class="btn btn-primary" id="botao-procurar-clientes" onclick="redirecionar()" data-toggle="tooltip" data-placement="top" title="Procurar Clientes"></button>
                <button type="button" class="btn btn-primary" id="botao-voltar" onclick="" data-toggle="tooltip" data-placement="top" title="Voltar"></button>
                  <fieldset>
              </form>
            @endsection
       
              @push('javascript', '<script src="' . asset('js/jquery-3.2.1.min.js'). '"> </script>')
              @push('javascript', '<script type="text/javascript" src="' . asset('js/CadastroDono.js'). '"> </script>')
              @push('javascript', '<script type="text/javascript" src="' .asset('js/JFileChooser.js'). '"> </script>')
              
              
              
    