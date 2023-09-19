<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chamado;
use App\Mensagenschamado;
use Auth;


use Illuminate\Support\Facades\Session;
use App\Http\Requests\ChamadosclienteRequest;
use App\Http\Requests\ChamadosRequest;

class ChamadosclienteController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        /* 1 = Colaborador | 2 = Cliente */
        if(!$request->user()->authorizeRoles(['2'])) {
            $title = "Acesso não autorizado";
            return view('cms.errors.401', compact('title'));
        }

        $user = $request->user();

        $chamados = Chamado::where('user_cliente', $user->id)
        ->orderBy('id', 'DESC')
        ->paginate(100);
        $title = "Listando Chamados";

        return view('cms.chamadoscliente.index', compact('title', 'chamados'));
    }


    public function create(Request $request)
    {
        /* 1 = Administrador | 2 = Cliente | 3 = Conteudoria | 4 = Editor | 5 = Redator */
        if(!$request->user()->authorizeRoles(['2'])) {
            $title = "Acesso não autorizado";
            return view('cms.errors.401', compact('title'));
        }


        
        $title = "Novo Chamado";

        return view('cms.chamadoscliente.create', compact('title'));
    }

    public function store(ChamadosclienteRequest $request)
    {
        $new = $request->all();

        $user = $request->user();

        $new['user_cliente']= $user->id;
        $chamado= Chamado::create($new);

        $newmsgchamdo['chamado_id']= $chamado->id;
        $newmsgchamdo['user_remetente']= $user->id;
        $newmsgchamdo['texto']= $new['texto'];

        Mensagenschamado::create($newmsgchamdo);

        Session::flash('message', 'Chamado criado com sucesso!');
        Session::flash('class', 'success');
        return redirect()->route('meuschamados.index');
    }


    /*
    * Lista detalhes do chamado
    */
    public function listarchamados( Request $request, $chamado_id ){

        /* 1 = Colaborador | 2 = Cliente */
        if(!$request->user()->authorizeRoles(['2'])) {
            $title = "Acesso não autorizado";
            return view('cms.errors.401', compact('title'));
        }

        $user = $request->user();

        $chamado= Chamado::where('user_cliente', $user->id)
        ->where('id', $chamado_id)
        ->first();

        $title = "Listando Chamado";

        return view('cms.chamadoscliente.listar', compact('title', 'chamado'));


    }



    /*
    * Public funcion responder chamado
    */
    public function responderchamado(ChamadosRequest $request, $id_chamado){

        /* 1 = Colaborador | 2 = Cliente */
        if(!$request->user()->authorizeRoles(['2'])) {
            $title = "Acesso não autorizado";
            return view('cms.errors.401', compact('title'));
        }
        

        $dados= $request->all();

        

        if( isset($dados['resposta']) && !empty($dados['resposta']) ){

            $new['chamado_id']= $id_chamado;
            $new['user_remetente']= $request->user()->id;
            $new['texto']= $dados['resposta'];

            Mensagenschamado::create($new);

        }


        Session::flash('message', 'Editado com sucesso!');
        Session::flash('class', 'success');
        return redirect()->route('meuschamados.listarchamados', $id_chamado);

    }


}
