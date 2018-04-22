<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pet&Shop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/estilo_Tela_Cadastro_Dono.css') }}"/>


</head>
<body>

        <form>
            <fieldset>
                <legend id="titulo_Fieldset"> Cadastro de Cliente </legend>
                <div class="form-row">
                  <div class="form-group col-md-5">
                    <label for="idNome">Nome Completo<span class="asterisco">*</span>:</label>
                    <input type="text" class="form-control" id="idNome" placeholder="Digite seu nome completo" disabled>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="idCPF">CPF<span class="asterisco">*</span>:</label>
                    <input type="number" class="form-control" id="idCPF" placeholder="Digite seu CPF" disabled>
                  </div>
                  <div class="form-group col-md-3">
                        <label for="idData">Data de Nascimento<span class="asterisco">*</span>:</label>
                        <input type="date" class="form-control" id="idData" disabled>
                  </div>
                </div>

                <div class="form-row">
                        <div class="form-group col-md-3">
                          <label for="idCEP">CEP<span class="asterisco">*</span>:</label>
                          <input type="number" class="form-control" id="idCEP" placeholder="Digite seu CEP" disabled>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="idTelefone">Telefone<span class="asterisco">*</span>:</label>
                          <input type="number" class="form-control" id="idTelefone" placeholder="Digite seu Telefone" disabled>
                        </div>
                        <div class="form-group col-md-5">
                              <label for="idEmail">Email<span class="asterisco">*</span>:</label>
                              <input type="email" class="form-control" id="idEmail" placeholder="Digite seu E-mail" disabled>
                        </div>
                </div>

                <div class="form-row">
                      <div class="form-group col-md-6">
                            <label for="idEndereco">Enderenço:</label>
                            <input type="text" class="form-control" id="idEndereco" placeholder="Digite seu Endereço" disabled>
                      </div>
                      <div class="form-group col-md-6">
                            <label for="idBairro">Bairro:</label>
                            <input type="text" class="form-control" id="idBairro" placeholder="Digite seu Bairro" disabled>
                      </div>
                </div>
        
                <div class="form-row">
                  <div class="form-group col-md-5">
                    <label for="idCidade">Cidade:</label>
                    <input type="text" class="form-control" id="idCidade" placeholder="Digite sua cidade" disabled>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="idUf">UF:</label>
                    <select id="idUf" class="form-control" disabled>
                      <option selected>AC</option>
                      <option>AL</option>
                      <option>AM</option>
                      <option>AP</option>
                      <option>BA</option>
                      <option>CE</option>
                      <option>DF</option>
                      <option>ES</option>
                      <option>GO</option>
                      <option>MA</option>
                      <option>MG</option>
                      <option>MS</option>
                      <option>MT</option>
                      <option>PA</option>
                      <option>PB</option>
                      <option>PE</option>
                      <option>PI</option>
                      <option>PR</option>
                      <option>RJ</option>
                      <option>RN</option>
                      <option>RO</option>
                      <option>RR</option>
                      <option>RS</option>
                      <option>SC</option>
                      <option>SE</option>
                      <option>SP</option>
                      <option>TO</option>
                    </select>
                  </div>
                  <div class="form-group col-md-5">
                    <label for="idComplemento">Complemento:</label>
                    <input type="text" class="form-control" id="idComplemento" placeholder="Digite o complemento" disabled>
                  </div>

                  <div class="form-group col-md-5">
                    <label for="idObs"> Observações do cliente:</label> <br/>
                    <textarea id="idObs" rows="5" cols="100" disabled> </textarea> <br/>
                    <button type="button" class="btn btn-primary" id="botao-novo-cadastro" onclick="ativarCampos()" data-toggle="tooltip" data-placement="top" title="Novo Cadastro"></button>
                    <button type="submit" class="btn btn-primary" id="botao-salvar" data-toggle="tooltip" data-placement="top" title="Salvar" disabled></button>
                    <button type="button" class="btn btn-primary" id="botao-procurar-clientes" onclick="redirecionar()" data-toggle="tooltip" data-placement="top" title="Procurar Clientes"></button>
                    <button type="button" class="btn btn-primary" id="botao-voltar" onclick="voltar()" data-toggle="tooltip" data-placement="top" title="Voltar"></button>
                        </div>
                    <div id="mostrarImagem" class="form-group col-md-4">
                            <div id="image-holder"></div>
                            <input type = "file" value = "Imagem" id="fileUpload" accept=".jpg, .jpeg, .png" disabled/>
                  </div>
                  <fieldset>
              </form>
               
              
              <script src="{{asset('js/jquery-3.2.1.min.js')}}"> </script>
              <script type="text/javascript" src="{{asset('js/CadastroDono.js')}}"> </script> 
              <script type="text/javascript" src="{{asset('js/JFileChooser.js')}}"> </script>
              <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>