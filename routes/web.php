<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@home')->name('home');


Route::post('cadastrar', 'UsersController@cadastrar')->name('users.cadastrar');



/* ROUTES AUTHENTICATE */
Route::group(['prefix'=>'cms'], function(){
    Auth::routes();
});


/* ROUTES CMS */
Route::group(['prefix'=>'cms','middleware' => 'auth'], function(){
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    //Static Pages
    Route::resource('pages', 'PagesController');
    Route::resource('informacoes', 'InformacoesController');

    


    //Dynamic Content
    
    Route::resource('usuarios', 'UsersController');
    Route::resource('chamados', 'ChamadosController');
    Route::resource('meuschamados', 'ChamadosclienteController');

    Route::get('chamado/{id}', 'ChamadosController@listarchamados')->name('chamados.listarchamados');

    Route::put('chamado/{id}', 'ChamadosController@responderchamado')->name('chamados.responder');

    Route::get('meuschamados/gerenciar/{id}', 'ChamadosclienteController@listarchamados')->name('meuschamados.listarchamados');

    Route::put('meuschamados/responder/{id}', 'ChamadosclienteController@responderchamado')->name('meuschamados.responder');

    

    
    
    //Filtros
    Route::get('filtrar/chamados', 'FiltrosController@chamadosfiltro')->name('chamados.filtro');
    Route::get('buscar/chamados', 'FiltrosController@chamadosbusca')->name('chamados.busca');

    Route::get('filtrar/meuschamados', 'FiltrosController@meuschamadosfiltro')->name('meuschamados.filtro');
    Route::get('buscar/meuschamados', 'FiltrosController@meuschamadosbusca')->name('meuschamados.busca');
    
    Route::get('filtrar/slides', 'FiltrosController@slidesfiltro')->name('slides.filtro');
    Route::get('buscar/slides', 'FiltrosController@slidesbusca')->name('slides.busca');

    Route::get('filtrar/assistencias', 'FiltrosController@assistenciasfiltro')->name('assistencias.filtro');
    Route::get('buscar/assistencias', 'FiltrosController@assistenciasbusca')->name('assistencias.busca');


    Route::get('filtrar/repassesassistencias', 'FiltrosController@repassesassistenciasfiltro')->name('repassesassistencias.filtro');
    Route::get('buscar/repassesassistencias', 'FiltrosController@repassesassistenciasbusca')->name('repassesassistencias.busca');


    Route::get('buscar/categorias', 'FiltrosController@categoriasbusca')->name('categorias.busca');
    Route::get('buscar/galerias', 'FiltrosController@galeriasbusca')->name('galerias.busca');
    
    //Medias content
    Route::get('galerias/files/{id}', 'GaleriasController@filesall')->name('files.all');
    Route::post('galerias/files/up/{id}', 'GaleriasController@fileup')->name('file.up');
    Route::post('galerias/files/del/{id}', 'GaleriasController@filedel')->name('file.del');
});