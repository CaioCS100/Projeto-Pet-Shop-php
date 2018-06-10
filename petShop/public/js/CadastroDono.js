function ativarCampos()
{
    $('#idNome').prop('disabled', false);
    $('#idCPF').prop('disabled', false);
    $('#idData').prop('disabled', false);
    $('#idCEP').prop('disabled', false);
    $('#idTelefone').prop('disabled', false);
    $('#idEmail').prop('disabled', false);
    $('#idEndereco').prop('disabled', false);
    $('#idBairro').prop('disabled', false);
    $('#idCidade').prop('disabled', false);
    $('#idUf').prop('disabled', false);
    $('#idComplemento').prop('disabled', false);
    $('#idObs').prop('disabled', false);
    $('#fileUpload').prop('disabled', false);
    $('#botao-salvar').prop('disabled', false);
    $('#botao-novo-cadastro').prop('disabled', true);
    $('#botao-procurar-clientes').prop('disabled', true);
    $('#botao-editar').prop('disabled', true);
    $('#botao-excluir').prop('disabled', true);
    $('#idNome').focus();
}

function ativarMascaras()
{
    $('#idCPF').mask('000.000.000-00');
    $('#idCEP').mask('00000-000');
    $('#idTelefone').mask('(00) 0000-0000');
}

function confirmExclusao(id)
{
    if(confirm("Tem certeza que deseja excluir esse Cliente ?"))
    {
        location.href = "../excluirCliente/"+id;
    }
}

function limpa_formulário_cep() 
{
    //Limpa valores do formulário de cep.
    document.getElementById('idEndereco').value=("");
    document.getElementById('idBairro').value=("");
    document.getElementById('idCidade').value=("");
    document.getElementById('idUf').value="-";
}

function meu_callback(conteudo) 
{

    if (!("erro" in conteudo)) 
    {
        //Atualiza os campos com os valores.
        document.getElementById('idEndereco').value=(conteudo.logradouro);
        document.getElementById('idBairro').value=(conteudo.bairro);
        document.getElementById('idCidade').value=(conteudo.localidade);
        document.getElementById('idUf').value=conteudo.uf;
    }
    else 
    {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}

function pesquisacep(valor) 
{

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") 
    {
        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) 
        {
            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        }
        else 
        {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    }
    else 
    {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
}
//validar CPF
function validarCPF(cpf){
    cpf = cpf.replace(/\D/g, '');
    if(cpf.length != 11 || cpf.replace(eval('/'+cpf.charAt(1)+'/g'),'') == '')
    {
        alert("Formato de CPF inválido.");
        document.getElementById('idCPF').value=("");
    }
    else
    {
       for(n=9; n<11; n++)
       {
          for(d=0, c=0; c<n; c++) 
          {
            d += cpf.charAt(c) * ((n + 1) - c);
          }
          d = ((10 * d) % 11) % 10;
          if(cpf.charAt(c) != d)
          {
            alert("Formato de CPF inválido.");
            document.getElementById('idCPF').value=("");
          } 
       }
    }
 }