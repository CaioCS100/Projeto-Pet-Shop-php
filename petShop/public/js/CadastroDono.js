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