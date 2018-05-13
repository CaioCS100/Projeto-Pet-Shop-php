@extends('template.templateMenuBar')
    @push('css',' <link rel="stylesheet" href="' .asset('css/estilo_Tela_Cadastro_Animais.css'). '"')
 
    @section('Menu')
    <form method="POST" action=" {{ route('salvarAnimal') }} " enctype="multipart/form-data">
        {{ csrf_field() }}
        <fieldset>
            <legend id="titulo_Fieldset">Cadastrar Animal</legend>

            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    <strong>Erro ao cadastrar animal!</strong>
                        @foreach($errors->all() as $erro)
                            <p> {{ $erro }} </p>
                        @endforeach
                </div>
            @endif
                <div class="form-row">
                    <div class="form-group col-md-10">
                        <label for="idNomeDono">Nome Dono/Propietário/Cliente<span class="asterisco">*</span>:</label>
                        <input type="text" class="form-control" id="idNomeDono" name="nomeDono" placeholder="Clique no botão ao lado para encontrar o cliente desejado" disabled>
                    </div>
                    <div class="form-group col-md-2">
                    <button type="button" class="btn btn-secondary btn-lg" id="botaoPesquisar" disabled>Pesquisar Dono</button>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="idNomeAnimal">Nome do Animal<span class="asterisco">*</span>:</label>
                        <label for="idMacho"><span id="tituloCampoSexo"> Sexo<span class="asterisco">*</span>:</span></label>
                        <input type="text" class="form-control" id="idNomeAnimal" name="nomeAnimal" placeholder="Digite seu nome completo" disabled>
                    </div>
                    
                    <div class="form-group col-md-2" id="radioButton">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sexo" id="idMacho" value="M" disabled>
                            <label class="form-check-label" for="idMacho">Macho</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sexo" id="idFemea" value="F" disabled>
                            <label class="form-check-label" for="idFemea">Fêmea</label>
                        </div>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="idData">Data de Nascimento<span class="asterisco">*</span>:</label>
                        <input type="date" class="form-control" id="idData" name="data" disabled>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="idPeso">Peso<span class="asterisco">*</span>:</label>
                        <input type="text" class="form-control" id="idPeso" name="peso" disabled>
                    </div>
                </div>

                <div class="form-row">

                    <div class="form-group col-md-5">
                        <label for="idEspecie">Espécie<span class="asterisco">*</span>:</label>
                        <input type="text" class="form-control" id="idEspecie" name="especie" disabled>
                    </div>
                    <div class="form-group col-md-1">
                        <button type="button" class="btn btn-secondary" id="botao-Procurar" data-toggle="tooltip" data-placement="top" title="Procurar Espécies" disabled></button>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="idRaca">Raça<span class="asterisco">*</span>:</label>
                        <input type="text" class="form-control" id="idRaca" name="raca" disabled>
                    </div>
                    <div class="form-group col-md-1">
                        <button type="button" class="btn btn-secondary" id="botao-Procurar" data-toggle="tooltip" data-placement="top" title="Procurar Raças" disabled></button>
                    </div> 

                </div>

                <div class="form-row">

                    <div class="form-group col-md-4">

                         Já teve cadastro em outro pet shop? Se sim, qual ?
                            <br/>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Sexo" id="idSim" value="S" disabled>
                                <label class="form-check-label" for="idSim">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Sexo" id="idNao" value="N" disabled>
                                <label class="form-check-label" for="idNao">Não</label>
                            </div> 
                            <br/>
                            <input type="text" class="form-control" disabled/>
                    </div>
                    <div class="form-group col-md-2"> </div>
                    <div class="form-group col-md-5">
                        <label for="idCor">Identificação/Cor/Pelagem<span class="asterisco">*</span>:</label>
                        <input type="text" class="form-control" id="idCor" name="cor" disabled>
                    </div>
                    <div class="form-group col-md-1">
                            <button type="button" class="btn btn-secondary" id="botao-Procurar" data-toggle="tooltip" data-placement="top" title="Procurar Raças" disabled></button>
                    </div>
                
                </div>

                <div class="form-row">

                    <div class="form-group col-md-5">
                      <label for="idObs"><strong> Observações e possíveis doenças sobre o pet:</strong></label> <br/>
                      <textarea id="idObs" name="obs" rows="5" cols="95" disabled> </textarea> <br/>
                    </div>
                    <div id="mostrarImagem" class="form-group col-md-4">
                              <div id="image-holder"></div>
                              <input type = "file" value = "Imagem" id="fileUpload" name="imagem" accept=".jpg, .jpeg, .png"/>
                    </div>
                  </div>

                <button type="button" class="btn btn-primary" id="botao-novo-cadastro" onclick="ativarCampos()" data-toggle="tooltip" data-placement="top" title="Novo Cadastro de animais"></button>
                <button type="submit" class="btn btn-primary" id="botao-salvar" data-toggle="tooltip" data-placement="top" title="Salvar"></button>
                <button type="button" class="btn btn-primary" id="botao-procurar-animais" onclick="redirecionar()" data-toggle="tooltip" data-placement="top" title="Procurar Animais"></button>
                <button type="button" class="btn btn-primary" id="botao-voltar" onclick="voltar()" data-toggle="tooltip" data-placement="top" title="Voltar"></button>
        </fieldset>
      </form>
    @endsection('Menu')

      @push('javascript','<script src="' .asset('js/jquery-3.2.1.min.js'). '"> </script>')
      @push('javascript', '<script type="text/javascript" src="' .asset('js/JFileChooser.js'). '"> </script>')

      
      
      
