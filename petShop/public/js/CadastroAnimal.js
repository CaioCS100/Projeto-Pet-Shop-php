var nome;
var especie;
var idEspecie = 2;
var raca;

function ativarCampos() {
    //$('#idNomeDono').prop('disabled', false);
    $('#botaoPesquisar').prop('disabled', false);
    $('#idNomeAnimal').prop('disabled', false);
    $('#idMacho').prop('disabled', false);
    $('#idFemea').prop('disabled', false);
    $('#idData').prop('disabled', false);
    $('#idPeso').prop('disabled', false);
    //$('#idEspecie').prop('disabled', false);
    $('#botao-Procurar-especie').prop('disabled', false);
    //$('#idRaca').prop('disabled', false);
    $('#botao-Procurar-raca').prop('disabled', false);
    $('#idSim').prop('disabled', false);
    $('#idNao').prop('disabled', false);
    $('#idInfoPet').prop('disabled', false);
    $('#idCor').prop('disabled', false);
    $('#botao-Cor').prop('disabled', false);
    $('#idObs').prop('disabled', false);
    $('#botao-salvar').prop('disabled', false);
    $('#botao-novo-cadastro').prop('disabled', true);
    $('#botao-procurar-clientes').prop('disabled', true);
    $('#botaoPesquisar').focus();
}

function selecionarLinha() {
    var tr = $('table tr');
    tr.on('click', function () {
        var self = this;
        tr.each(function () {
            if (this == self) $(this).toggleClass('colorir');
            else
            {
                this.nome = undefined; // depois ver o bug que quando desmarcar a linha, a variavel id ainda 
                                    //fica com o valor 
                $(this).removeClass('colorir');
            } 
        })
    });
}

function setNome(nomeDono)
{
    this.nome = nomeDono;
}

function setEspecie(nomeEspecie)
{
    this.especie = nomeEspecie;
}

function getIdEspecie()
{
    alert(this.idEspecie);
}

function setRaca(nomeRaca)
{
    this.raca = nomeRaca;
}

function selecionarDono() {
    $('#idNomeDono').val(nome);
    $('#nomeDonoModal').modal('hide');
}

function selecionarEspecie()
{
    $('#idEspecie').val(especie);
    $('#especieModal').modal('hide');
}

function selecionarRaca()
{
    $('#idRaca').val(raca);
    $('#racaModal').modal('hide');
}