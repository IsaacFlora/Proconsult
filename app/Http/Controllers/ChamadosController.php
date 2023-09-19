<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chamado;
use App\Mensagenschamado;
use Auth;

use Illuminate\Support\Facades\Session;
use App\Http\Requests\ChamadosRequest;

class ChamadosController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        /* 1 = Colaborador | 2 = Cliente */
        if(!$request->user()->authorizeRoles(['1'])) {
            $title = "Acesso não autorizado";
            return view('cms.errors.401', compact('title'));
        }

        $chamados = Chamado::orderBy('id', 'DESC')->paginate(100);
        $title = "Listando Chamados";

        return view('cms.chamados.index', compact('title', 'chamados'));
    }


    /*
    * Lista detalhes do chamado
    */
    public function listarchamados( Request $request, $chamado_id ){

        /* 1 = Colaborador | 2 = Cliente */
        if(!$request->user()->authorizeRoles(['1'])) {
            $title = "Acesso não autorizado";
            return view('cms.errors.401', compact('title'));
        }

        $chamado= Chamado::where('id', $chamado_id)
        ->first();

        $title = "Listando Chamado";

        return view('cms.chamados.listar', compact('title', 'chamado'));


    }


    /*
    * Public funcion responder chamado
    */
    public function responderchamado(ChamadosRequest $request, $id_chamado){

        /* 1 = Colaborador | 2 = Cliente */
        if(!$request->user()->authorizeRoles(['1'])) {
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


        if( isset($dados['finalizarchamado']) && !empty($dados['finalizarchamado']) ){

            $chamado = Chamado::findOrFail($id_chamado);
            $up['status']= 2;
            $chamado->update($up);

        }


        Session::flash('message', 'Editado com sucesso!');
        Session::flash('class', 'success');
        return redirect()->route('chamados.listarchamados', $id_chamado);

    }






    public function destroy(Request $request, $id)
    {
        /* 1 = Colaborador | 2 = Cliente */

        if(!$request->user()->authorizeRoles(['1'])) {

            $title = "Acesso não autorizado";
            return view('cms.errors.401', compact('title'));
        }

        $chamado = Chamado::findOrFail($id);


        $chamado->delete();

        Session::flash('message', 'Removido com sucesso!');
        Session::flash('class', 'danger');
        return redirect()->route('chamados.index');
    }


}
