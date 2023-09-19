<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserscadastrarRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $dados= $this->request->all();

        $valida= array(
            'name'=>'required',
            'password'=>'required|confirmed',
            'email'=>'required|unique:users',
            'cpf'=>'required|unique:users'
        );

        return $valida;


    }

    public function messages()
    {
        return [
            'name.required'=>'Nome é obrigatório',
            'password.required'=>'Senha é obrigatória',
            'password.confirmed'=>'As senhas devem ser iguais',

            'email.required'=>'E-mail é obrigatório',
            'email.unique'=>'E-mail :input já existe no Proconsult',

            'cpf.required'=>'CPF é obrigatório',
            'cpf.unique'=>'CPF :input já existe no Proconsult',

            
        ];
    }


}
