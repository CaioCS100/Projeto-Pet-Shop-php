<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Usuario;

class LoginController extends Controller
{
    public function login()
    {
        return view('tela_Inicial');
    }
   
    public function logar(Request $request)
    {
        $usuario = Usuario::where('login',$request->cTexto)->where('senha',$request->cSenha)->first();

        if($usuario!=null)
        {
            session(['usuario' => $usuario]);
            return redirect()->route('paginaPrincipal');
        }
        else
        {
            return redirect()->back()->with('invalido', true);
        }       
    }

    public function sair()
    {

        session()->flush();
        return redirect()->action('LoginController@login'); 
    }

    public function redirecionarPagina()
    {
        return view('tela_principal');
    }

}
