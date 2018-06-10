var nome;
var especie;
var idEspecie = 2;
var raca;
var contador = 0;

function ativarCampos() {
    $('#botaoPesquisar').prop('disabled', false);
    $('#idNomeAnimal').prop('disabled', false);
    $('#idMacho').prop('disabled', false);
    $('#idFemea').prop('disabled', false);
    $('#idData').prop('disabled', false);
    $('#idPeso').prop('disabled', false);
    $('#idSim').prop('disabled', false);
    $('#idNao').prop('disabled', false);
    $('#idCor').prop('disabled', false);
    $('#botao-Cor').prop('disabled', false);
    $('#idObs').prop('disabled', false);
    $('#botao-salvar').prop('disabled', false);
    $('#botao-novo-cadastro').prop('disabled', true);
    $('#botao-editar').prop('disabled', true);
    $('#botao-delete').prop('disabled', true);
    $('#botao-procurar-animais').prop('disabled', true);
    if($('#idNomeDono') != null && $('#idNomeDono') != "")
    {
        $('#botao-Procurar-especie').prop('disabled', false);
    }
    if($('#idEspecie') != null && $('#idEspecie') != "")
    {
        $('#botao-Procurar-raca').prop('disabled', false);
        this.especie = $('#idEspecie').val();
    }
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
    $('.especie-animal').hide();
    this.especie = nomeEspecie;

    $('.especie-' + nomeEspecie).show();
}

function showModalRacas(num)
{
    this.contador += num;
    // verifico se é a 1 vez que a pessoa clica para abrir o modal
    // se for ela carrega as raças do modal a partir das informações
    // da especie vinda do metodo ativarCampos(), mas precisamente
    // do campo especie, que eu inicializo na hora que eu clico
    // no metodo ativarCampos(). << so funciona na tela_Mostrar_Editar_Animais
    if(this.contador == 1)
    {
        $('.especie-animal').hide();
        $('.especie-' + this.especie).show();
    }
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
    if(nome!="" && nome != null)
    {
        $('#botao-Procurar-especie').prop('disabled', false);
    }
}

function selecionarEspecie()
{
    $('#idEspecie').val(especie);
    $('#especieModal').modal('hide');
    if(especie!="" && especie!= null)
    {
        $('#botao-Procurar-raca').prop('disabled', false);
    }
}

function selecionarRaca()
{
    $('#idRaca').val(raca);
    $('#racaModal').modal('hide');
}

function ativarCampoInfoPet()
{
    $('#idInfoPet').prop('readonly', false);
}

function desativarCampoInfoPet()
{
    $('#idInfoPet').prop('readonly', true);
    $('#idInfoPet').val("");
}
