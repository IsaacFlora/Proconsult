<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
    
    /* Array de campos protegidos a serem gravados no banco. Ao usar [body] ele aceitará TODOS os campos. */
    protected $fillable = [
        'titulo',
        'user_cliente', 
        'user_colaborador',
        'status'
    ];


    /* Retorna o cliente do chamado */
    public function cliente(){
        return $this->belongsTo('App\User', 'user_cliente');
    }

    /* Retorna o colaborador do chamado */
    public function colaborador(){
        return $this->belongsTo('App\User', 'user_colaborador');
    }


    /* Mensagens do chamado. */
    public function mensagens(){
        return $this->hasMany('App\Mensagenschamado','chamado_id');
    }


}
