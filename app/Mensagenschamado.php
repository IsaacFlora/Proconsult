<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagenschamado extends Model
{
    

    /* Array de campos protegidos a serem gravados no banco. Ao usar [body] ele aceitará TODOS os campos. */
    protected $fillable = [
        'chamado_id',
        'user_remetente',
        'texto'
    ];


    /* Retorna o cliente que enviou a mensagem */
    public function remetente(){
        return $this->belongsTo('App\User', 'user_remetente');
    }


}
