<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Proprietario;

class ProprietarioController extends Controller
{
    public function chamarTelaCadastroCliente(){
        $dados['ufs'] = $this->UF();
        return view('tela_Cadastro_Dono', $dados);
    }

    public function chamarTelaProcurarClientes()
    {
        $cliente = Proprietario::all();
        return view('tela_Procurar_Cliente',['cliente'=>$cliente]);
    }

    public function addNovoCliente(Request $request){

        $request -> validate([
            'nome' => 'required',
            'cpf' => 'required',
            'data' => 'required',
            'cep' => 'required',
            'telefone' => 'required',
            'email' => 'required|email',
            'imagem' => 'image'
            ]);

        $telefone_DDD = $this->retirarDDDEMaskTelefone($request->telefone);
        $nomeDaImagem = "";
       
        if($request->imagem!=null)
        {
            $extesao = $request->imagem->extension();
            $nomeDaImagem = $request->cpf;
            $request->imagem->storeas('public', "$nomeDaImagem."."$extesao");
        }

        $nomeDono = new Proprietario;

        $nomeDono->nome = $request->nome;
        $nomeDono->cpf = $this->retirarMaskCpf($request->cpf);
        $nomeDono->data_de_nascimento = $request->data;
        $nomeDono->cep = $this->retirarMaskCEP($request->cep);
        $nomeDono->telefone = $telefone_DDD[1];
        $nomeDono->ddd = $telefone_DDD[0];
        $nomeDono->email = $request->email;
        $nomeDono->endereco = $request->endereco;
        $nomeDono->bairro = $request->bairro;
        $nomeDono->cidade = $request->cidade;
        $nomeDono->uf = $request->uf;
        $nomeDono->observacao_cliente = $request->obs;
        $nomeDono->complemento = $request->complemento;
        $nomeDono->nome_da_imagem = $nomeDaImagem;
        $nomeDono->save(); 
        return redirect()->route('cadastrarDono')->with('cadastrado', true);
    }

    public function mostrarCliente(Request $request,$id)
    {
        $dadosDono = Proprietario::where('id',$id)->first(); 
        $dadosUF['allUfs'] = $this->UF();
        $dadosDono->cpf = $this->mask($dadosDono->cpf,'###.###.###-##');
        $dadosDono->cep = $this->mask($dadosDono->cep,'#####-###');
        $dadosDono->ddd = $this->mask($dadosDono->ddd,'(##) ');
        $dadosDono->telefone = $dadosDono->ddd . $this->mask($dadosDono->telefone,'####-####');
        return view('tela_Mostrar_Editar_Dono',$dadosUF,['cliente'=>$dadosDono]);
        // echo"$dadosDono->cpf";
        // echo"<br/>";
        // echo"$dadosDono->cep";
        // echo"<br/>";
        //echo"$dadosDono->data_de_nascimento";
    }

    function retirarDDDEMaskTelefone($val)
    {
        $ddd = $val;
        $ddd = str_replace("(","",$ddd);
        $ddd = str_replace(")","",$ddd);
        $ddd = explode(" ",$ddd);
        $telefoneSemDDD = $ddd[1];
        $ddd = $ddd[0];
        $telefoneSemDDD = str_replace("-","",$telefoneSemDDD);

        return array($ddd,$telefoneSemDDD);
    }

    function retirarMaskCEP($val)
    {
        $cepSemCaracterEspecial = $val;
        $cepSemCaracterEspecial = str_replace("-","",$cepSemCaracterEspecial);

        return $cepSemCaracterEspecial;
    }

    function retirarMaskCpf($val)
    {
        $cpfSemCaracterEspecial = $val;
        $cpfSemCaracterEspecial = str_replace(".","",$cpfSemCaracterEspecial);
        $cpfSemCaracterEspecial = str_replace("-","",$cpfSemCaracterEspecial);

        return $cpfSemCaracterEspecial;
    }

    function mask($val, $mask)
    {
        $maskared = '';
        $k = 0;
        for($i = 0; $i<=strlen($mask)-1; $i++)
        {
            if($mask[$i] == '#')
            {
                if(isset($val[$k]))
                {
                    $maskared .= $val[$k++];
                }
            }
            else
            {
                if(isset($mask[$i]))
                {
                    $maskared .= $mask[$i];
                }
            }
        }
        return $maskared;
    }

    public function UF()
    {
        return array(
            "AC",
            "AL",
            "AM",
            "AP",
            "BA",
            "CE",
            "DF",
            "ES",
            "GO",
            "MA",
            "MG",
            "MS",
            "MT",
            "PA",
            "PB",
            "PE",
            "PI",
            "PR",
            "RJ",
            "RN",
            "RO",
            "RR",
            "RS",
            "SC",
            "SE",
            "SP",
            "TO"
        );
    }

}