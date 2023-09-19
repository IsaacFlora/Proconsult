<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'nome'=>'required',
            'senha'=>'required',
        );

        if( isset($dados['id']) ){

            $valida['email']= 'required|unique:users,email,'.$dados['id'];
          
        }else{

            $valida['email']= 'required|unique:users';

        }

        

        return $valida;


    }

    public function messages()
    {
        return [
            'name.required'=>'Nome é obrigatório',
            'password.required'=>'Senha é obrigatória',

            'email.required'=>'E-mail é obrigatório',
            'email.unique'=>'E-mail :input já existe no Alugadrone',

            
        ];
    }


}
