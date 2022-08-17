<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ColaboradorRequest extends FormRequest
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
                'email' => $this->calaborador
                ? 'required|email|max:191|unique:colaborador,email,'. $this->calaborador : 'required|email|max:191|unique:colaborador,email',
                'cpf' => $this->calaborador !== null
                ? 'unique:colaborador,cpf,'. $this->calaborador  : 'required|unique:colaborador,cpf',
            ];
        }
        return [];
    }

    public function messages()
    {
        return [
            'email.required' => 'O email é obrigatório.',
            'email.unique' => 'Email deve ser unico',
            'cpf.required' => 'O cpf é obrigatório.',
            'cpf.unique' => 'CPF deve ser unico',
        ];
    }
}
