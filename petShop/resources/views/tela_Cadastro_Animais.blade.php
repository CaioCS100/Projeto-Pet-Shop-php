@extends('template.templateMenuBar')
    @push('css',' <link rel="stylesheet" href="' .asset('css/estilo_Tela_Cadastro_Animais.css'). '"')
 
    @section('Menu')

    @if(session('cadastrado'))
        <div class="alert alert-success temporario" role="alert">
            <strong>Animal Cadastrado com Sucesso!</strong>
        </div>
    @endif

    <form method="POST" action=" {{ route('salvarAnimal') }} " enctype="multipart/form-data">
        {{ csrf_field() }}
        <fieldset>
            <legend id="titulo_Fieldset">Cadastrar Animal</legend>
                <div id="espaco">

                    @if($errors->any())
                        <div class="alert alert-danger temporario" role="alert">
                            <strong>Erro ao cadastrar animal!</strong>
                                @foreach($errors->all() as $erro)
                                    <p> {{ $erro }} </p>
                                @endforeach
                        </div>
                    @endif
                        <div class="form-row">
                            <div class="form-group col-md-10">
                                <label for="idNomeDono">Nome Dono/Propietário/Cliente<span class="asterisco">*</span>:</label>
                                <input type="text" class="form-control" id="idNomeDono" name="nomeDono" placeholder="Clique no botão ao lado para encontrar o cliente desejado" readonly>
                            </div>
                            <div class="form-group col-md-2">
                            <button type="button" class="btn btn-secondary btn-lg" data-toggle="modal" data-target="#nomeDonoModal" id="botaoPesquisar"  disabled>Pesquisar Dono</button>
                            </div>
                            <div class="modal fade" id="nomeDonoModal" tabindex="-1" role="dialog" aria-labelledby="nomeDonoModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="nomeDonoModalLabel">Selecione um Cliente</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
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
                                                            <tr onclick="selecionarLinha();setNome('{{ $dadostabela['nome'] }}');">
                                                                <th scope="row">{{$dadostabela['id']}}</th>
                                                                <td> {{$dadostabela['nome']}} </td>
                                                                <td> {{$dadostabela['telefone']}} </td>
                                                                <td> {{$dadostabela['data_de_nascimento']}} </td>
                                                                <td> {{$dadostabela['observacao_cliente']}} </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                            </table>
                                            {!! $cliente->links() !!}
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-primary" onclick="selecionarDono()">Selecionar</button>
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    </div>
                                  </div>
                                </div>
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
                                <input type="number" class="form-control" id="idPeso" name="peso" disabled>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-5">
                                <label for="idEspecie">Espécie<span class="asterisco">*</span>:</label>
                                <input type="text" class="form-control" id="idEspecie" name="especie" readonly>
                            </div>
                            <div class="form-group col-md-1">
                                <button type="button" class="btn btn-secondary botao-Procurar" id="botao-Procurar-especie" data-toggle="modal" data-target="#especieModal" data-placement="top" title="Procurar Espécies" disabled></button>
                            </div>
                            <div class="modal fade" id="especieModal" tabindex="-1" role="dialog" aria-labelledby="especieModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="especieModalLabel">Selecione uma Espécie</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                            <table class="table table-hover" id="tabela">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Nome</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($especie as $dadostabela)
                                                            <tr onclick="selecionarLinha();setEspecie('{{ $dadostabela['nome_especie'] }}');">
                                                                <th scope="row">{{$dadostabela['id']}}</th>
                                                                <td> {{$dadostabela['nome_especie']}} </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                            </table>
                                            {!! $especie->links() !!}
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-primary" onclick="selecionarEspecie();">Selecionar</button>
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <div class="form-group col-md-5">
                                <label for="idRaca">Raça<span class="asterisco">*</span>:</label>
                                <input type="text" class="form-control" id="idRaca" name="raca" readonly>
                            </div>
                            <div class="form-group col-md-1">
                                <button type="button" class="btn btn-secondary botao-Procurar" id="botao-Procurar-raca" data-toggle="modal" data-target="#racaModal" data-placement="top" title="Procurar Raças" disabled></button>
                            </div> 
                            <div class="modal fade" id="racaModal" tabindex="-1" role="dialog" aria-labelledby="racaModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="racaModalLabel">Selecione uma Espécie</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                            <table class="table table-hover" id="tabela">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Nome</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($especie as $dadostabela)
                                                            @foreach ($dadostabela->racas as $dadostabelaracas)
                                                                <tr onclick="selecionarLinha();setRaca('{{ $dadostabelaracas['nome_raca'] }}');">
                                                                    {{-- @if($dadostabelaracas['especie_id'] == 2) --}}
                                                                        <th scope="row">{{$dadostabelaracas['id']}}</th>
                                                                        <td> {{$dadostabelaracas['nome_raca']}} </td>
                                                                    {{-- @endif --}}
                                                                </tr>
                                                            @endforeach
                                                        @endforeach
                                                    </tbody>
                                            </table>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-primary" onclick="selecionarRaca();">Selecionar</button>
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    </div>
                                  </div>
                                </div>
                              </div>

                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-5">

                                Já teve cadastro em outro pet shop? Se sim, qual ?
                                    <br/>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="checkInfoPet" id="idSim" value="S" disabled>
                                        <label class="form-check-label" for="idSim">Sim</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="checkInfoPet" id="idNao" value="" disabled>
                                        <label class="form-check-label" for="idNao">Não</label>
                                    </div> 
                                    <br/>
                                    <input type="text" class="form-control" id="idInfoPet" name="infoPet" disabled/>
                            </div>
                            <div class="form-group col-md-1"> </div>
                            <div class="form-group col-md-6">
                                <label for="idCor">Identificação/Cor/Pelagem<span class="asterisco">*</span>:</label>
                                <input type="text" class="form-control" id="idCor" name="cor" disabled>
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
                </div>
        </fieldset>
    </form>
    @endsection('Menu')

      @push('javascript','<script src="' .asset('js/jquery-3.2.1.min.js'). '"> </script>')
      @push('javascript', '<script type="text/javascript" src="' .asset('js/JFileChooser.js'). '"> </script>')
      @push('javascript', '<script type="text/javascript" src="' .asset('js/CadastroAnimal.js'). '"></script')
      @push('javascrupt','<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>')
      @push('javascript','<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>')  