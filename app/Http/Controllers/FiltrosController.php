<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Chamado;

class FiltrosController extends Controller
{
	

	//Listar chamados por nome do cliente
    public function chamadosbusca(Request $request)
    {
    	$buscar = $request->all();
    	$chamados = Chamado::from('chamados as ch')
        ->select('ch.*')
        ->join('users', 'users.id', 'ch.user_cliente')
        ->where('ch.titulo', 'like', '%'.$buscar['busca'].'%')
        ->orderBy('ch.id', 'DESC')
        ->paginate(100);
    	
    	$title = "Listando Chamados - Resultado por: ".$buscar['busca'];
    	return view('cms.chamados.index', compact('title', 'chamados'));
    }


    //Listar chamados por nome do cliente
    public function meuschamadosbusca(Request $request)
    {
        $buscar = $request->all();

        $user = $request->user();

        
        $chamados = Chamado::from('chamados as ch')
        ->select('ch.*')
        ->join('users', 'users.id', 'ch.user_cliente')
        ->where('user_cliente', $user->id)
        ->where('ch.titulo', 'like', '%'.$buscar['busca'].'%')
        ->orderBy('ch.id', 'DESC')
        ->paginate(100);
        
        $title = "Listando Chamados - Resultado por: ".$buscar['busca'];
        return view('cms.chamadoscliente.index', compact('title', 'chamados'));
    }

    
}
