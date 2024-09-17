<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{


    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'foto' => 'bail|image|max:1096',
            'name'=> 'required',
            'email'=> 'required',
            'codigo'=> 'required',
            'access_level'=> 'required',
            'tipo'=> 'required'
        ];
    }

    public function messages(): array
    {
        return[
            'foto.max' => 'o tamanho máximo é 1mb',
            'foto.image' => 'o arquivo tem que ser do tipo imagem (jpeg, jpg ou png)',
            'name.required' => 'nome é obrigatório',
            'email.required' => 'o e-mail é obrigatório',
            'codigo.required' => 'o código é obrigatório',
            'access_level.required' => 'o nível de acesso é obrigatório',
            'tipo.required' => 'o tipo de usuário é obrigatório'
        ];
    }
}
