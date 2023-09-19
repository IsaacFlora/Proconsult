<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['guest:api']], function () {
    Route::get('/', function()
    {
        return 'Olá mundo API';
    });

    Route::post('login', 'api\LoginController@login');

    Route::post('cadastrar', 'api\UsersController@cadastrar');

    Route::post('checaemail', 'api\CadastroController@checaemail');
    
    Route::post('password/create', 'api\PasswordResetController@create');
    Route::get('password/find/{token}', 'api\PasswordResetController@find');
    Route::post('password/reset', 'api\PasswordResetController@reset');


    //ESTADOS E CIDADES
    Route::prefix('estados')->group(function(){

        //Lista os estados cadastrados no sistema
        Route::get('/', 'api\EstadosController@listar')->name('api_estados_listar');

        //Lista 
        Route::get('/cidades/{estado_id}', 'api\EstadosController@listarcidades')->name('api_estadoscidades_listar');

        
    });


    //ASSISTENCIAS TECNICAS DO SISTEMA
    Route::prefix('assistencias')->group(function(){

        //Lista os estados cadastrados no sistema
        Route::get('/', 'api\AssistenciasController@listar')->name('api_assistencias_listar');

        
    });

    

    

});

Route::group(['middleware' => 'auth:api'], function() {
    
    //ANUNCIO
    Route::prefix('anuncio')->group(function(){

        Route::post('/','api\AnuncioController@cadastrar')->name('api_anuncio_cadastrar');
        
    });


    //FAVORITOS
    Route::prefix('favorito')->group(function(){

        Route::post('/','api\FavoritoController@gerenciarFavorito')->name('api_favorito_gerenciar');

        Route::get('/','api\FavoritoController@listar')->name('api_favoritos_listar');
        
    });

    //VITRINE
    Route::prefix('vitrine')->group(function(){

        Route::get('/','api\VitrineController@listar')->name('api_vitrine_listar');
        
    });

    Route::get('logout', 'api\LoginController@logout');
    Route::get('checalogin', 'api\LoginController@checalogin');
    
});