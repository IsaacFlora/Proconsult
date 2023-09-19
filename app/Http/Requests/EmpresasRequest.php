<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresasRequest extends FormRequest
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
        
        $pg = $this->segment(1);

        $dados= $this->request->all();


        $rules= [
                
                'nome' => 'required',
                'email' => 'required',
                'celular' => 'required',
                'cpf'=>[
                    function($atributo, $valor, $retorno){

                        $valido=true;

                        $cpf = preg_replace("/[^0-9]/", "", $valor);
                        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

                        if(

                            $cpf == '00000000000' || 
                            $cpf == '11111111111' || 
                            $cpf == '22222222222' || 
                            $cpf == '33333333333' || 
                            $cpf == '44444444444' || 
                            $cpf == '55555555555' || 
                            $cpf == '66666666666' || 
                            $cpf == '77777777777' || 
                            $cpf == '88888888888' || 
                            $cpf == '99999999999' ||
                            strlen($cpf) != 11

                        ){


                            $valido=false;

                        }

                        for ($t = 9; $t < 11; $t++) {
            
                            for ($d = 0, $c = 0; $c < $t; $c++) {
                                $d += $cpf[$c] * (($t + 1) - $c);
                            }
                            $d = ((10 * $d) % 11) % 10;
                            if ($cpf[$c] != $d) {
                                $valido=false;
                            }
                        }

                        if(!$valido){

                            return $retorno("O CPF digitado é invalido");
                        }

                    }
                ],
                'rg' => 'required',

                'cnpj' => 'required',
                'razaosocial' => 'required',
                'nomeempresa' => 'required',
                'telefoneempresa' => 'required',
                'cep' => 'required',
                'estado' => 'required',
                'cidade' => 'required',
                
               
        ];


        if( $pg=='cadastroadd' || !empty( $dados['password'] ) ){

            $rules['password']= 'required|confirmed|min:6';

        }

        return $rules;

    }


    /**
     * Array de mensagens personalizadas dos campos obrigatórios
     *
     * @return array
     */
    public function messages()
    {
        return [
            
            'nome.required' => 'Nome é obrigatório',
            'email.required' => 'E-mail é obrigatório',
            'celular.required' => 'Celular é obrigatório',
            'cpf.required' => 'Cpf é obrigatório',
            'rg.required' => 'Rg é obrigatório',
            'password.confirmed' => 'O campo senha de confirmação não confere.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'O campo senha deve ter pelo menos :min caracteres.',

            'cnpj.required' => 'CNPJ é obrigatório',
            'razaosocial.required' => 'Razão Social é obrigatório',
            'nomeempresa.required' => 'Nome da empresa é obrigatório',
            'telefoneempresa.required' => 'Telefone da empresa é obrigatório',
            'cep.required' => 'CEP é obrigatório',
            'estado.required' => 'Estado é obrigatório',
            'cidade.required' => 'Cidade é obrigatório',
            


        ];

    }



}
