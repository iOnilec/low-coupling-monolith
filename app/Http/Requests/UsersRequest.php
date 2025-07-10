<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class UsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'users_id' => 'required|string',
            'users_name' => 'required|string',
            'users_email' => 'required|string',
            'users_job_name' => 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'users_id.required' => 'O campo ID do usuário é obrigatório.',
            'users_id.string' => 'O campo ID do usuário deve ser uma string.',

            'users_name.required' => 'O campo nome do usuário é obrigatório.',
            'users_name.string' => 'O campo nome do usuário deve ser uma string.',

            'users_email.required' => 'O campo e-mail do usuário é obrigatório.',
            'users_email.string' => 'O campo e-mail do usuário deve ser uma string.',

            'users_job_name.required' => 'O campo cargo do usuário é obrigatório.',
            'users_job_name.string' => 'O campo cargo do usuário deve ser uma string.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException(
            $validator,
            response()->json([
                'status' => 424,
                'messages' => 'Erro na validação dos dados.',
                'errors' => $validator->errors()
            ])
        );
    }
}
