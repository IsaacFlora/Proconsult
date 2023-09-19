<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChamadosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Array de campos obrigatórios do conteúdo
     *
     * @return array
     */
    public function rules()
    {
        $dados= $this->request->all();

        $valida= array();

        if( !isset($dados['finalizarchamado']) ){

            $valida['resposta']= 'required';
          
        }

        return $valida;


    }

    /**
     * Array de mensagens personalizadas dos campos obrigatórios
     *
     * @return array
     */
    public function messages()
    {
        return [
            'resposta.required'=>'Resposta é obrigatório'
        ];
    }


}
