<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PagesRequest;
use Illuminate\Support\Facades\Session;

use App\Http\Requests\EmpresasRequest;
use App\Notifications\Cadastroempresa;

use App\Page;
use App\Post;
use App\Canal;
use Carbon\Carbon;
use App\Estado;
use App\Cidade;
use App\Assistencia;
use App\User;

class PagesController extends Controller
{

    public function __construct()
    {

    }


    //-----------------------------------------------------------------------



    //Views
    public function home( Request $request )
    {
        return view('welcome');
    }



}