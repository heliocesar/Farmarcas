<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class SalarioRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            return [
                'salario' => 'required',
                'colaborador_id' => 'required'
            ];
        }
        return [];
    }

    public function messages()
    {
        return [
            'salario.required' => 'O email é obrigatório.',
            'colaborador_id.required' => 'O cpf é obrigatório.',
        ];
    }
}
