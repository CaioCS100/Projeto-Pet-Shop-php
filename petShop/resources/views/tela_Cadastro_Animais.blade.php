<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pet&Shop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/estilo_Tela_Cadastro_Animais.css') }}"

</head>
<body>
    <form>
        <fieldset>
            <legend>Cadastrar Animal</legend>
                <div class="form-row">
                    <div class="form-group col-md-10">
                        <label for="idNomeDono">Nome Dono/Propietário/Cliente<span class="asterisco">*</span>:</label>
                        <input type="text" class="form-control" id="idNomeDono" placeholder="Clique no botão ao lado para encontrar o cliente desejado" disabled>
                    </div>
                    <div class="form-group col-md-2">
                    <button type="button" class="btn btn-secondary btn-lg" id="botaoPesquisar" disabled>Pesquisar Dono</button>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="idNomeAnimal">Nome do Animal<span class="asterisco">*</span>:</label>
                        <input type="text" class="form-control" id="idNomeAnimal" placeholder="Digite seu nome completo" disabled>
                    </div>

                    <div class="form-group col-md-2" id="radioButton">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Sexo" id="idMacho" value="M" disabled>
                            <label class="form-check-label" for="idMacho">Macho<span class="asterisco">*</span></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Sexo" id="idFemea" value="F" disabled>
                            <label class="form-check-label" for="idFemea">Fêmea<span class="asterisco">*</span></label>
                        </div>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="idData">Data de Nascimento<span class="asterisco">*</span>:</label>
                        <input type="date" class="form-control" id="idData" disabled>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="idPeso">Peso<span class="asterisco">*</span>:</label>
                        <input type="text" class="form-control" id="idPeso" disabled>
                    </div>
                </div>

                <div class="form-row">

                    <div class="form-group col-md-5">
                        <label for="idEspecie">Espécie<span class="asterisco">*</span>:</label>
                        <input type="text" class="form-control" id="idEspecie" disabled>
                    </div>
                    <div class="form-group col-md-1">
                        <button type="button" class="btn btn-secondary" id="botao-Procurar" data-toggle="tooltip" data-placement="top" title="Procurar Espécies" disabled></button>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="idRaca">Raça<span class="asterisco">*</span>:</label>
                        <input type="text" class="form-control" id="idRaca" disabled>
                    </div>
                    <div class="form-group col-md-1">
                        <button type="button" class="btn btn-secondary" id="botao-Procurar" data-toggle="tooltip" data-placement="top" title="Procurar Raças" disabled></button>
                    </div> 

                </div>

                <div class="form-row">

                    <div class="form-group col-md-4">

                        <fieldset>Animal já teve cadastro em outro pet shop? Se sim, qual ? 
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
                        </fieldset>
                    </div>
                    <div class="form-group col-md-2"> </div>
                    <div class="form-group col-md-5">
                        <label for="idCor">Identificação/Cor/Pelagem<span class="asterisco">*</span>:</label>
                        <input type="text" class="form-control" id="idCor" disabled>
                    </div>
                    <div class="form-group col-md-1">
                            <button type="button" class="btn btn-secondary" id="botao-Procurar" data-toggle="tooltip" data-placement="top" title="Procurar Raças" disabled></button>
                    </div>
                
                </div>

                <button type="button" class="btn btn-primary" id="botao-novo-cadastro" onclick="ativarCampos()" data-toggle="tooltip" data-placement="top" title="Novo Cadastro de animais"></button>
                <button type="submit" class="btn btn-primary" id="botao-salvar" data-toggle="tooltip" data-placement="top" title="Salvar" disabled></button>
                <button type="button" class="btn btn-primary" id="botao-procurar-animais" onclick="redirecionar()" data-toggle="tooltip" data-placement="top" title="Procurar Animais"></button>
                <button type="button" class="btn btn-primary" id="botao-voltar" onclick="voltar()" data-toggle="tooltip" data-placement="top" title="Voltar"></button>
        </fieldset>
      </form>


      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>