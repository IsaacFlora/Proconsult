<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	/* Array de campos protegidos a serem gravados no banco. Ao usar [body] ele aceitará TODOS os campos. */
    protected $fillable = [
    	'name', 'title', 'content_en', 'name_en', 'title_en', 'content_en', 'image', 'gallery_id', 'imghead', 'imgfix', 'keywords', 'description', 'keywords_en', 'description_en'
    ];

    /* Função para adicionar a URL do site automaticamente na imagem após puxar do banco
    URL determinada no .env */
    public function getImgheadAttribute($value) {
        if($value) {
            return config('app.url').'uploads/'.$value;
        }
    }

    public function getImgfixAttribute($value) {
        if($value) {
            return config('app.url').'uploads/'.$value;
        }
    }
}
