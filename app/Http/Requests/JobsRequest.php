<?php

namespace App\Http\Requests;

use Exception;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class JobsRequest extends FormRequest
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
            'jobs_name' => 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'jobs_name.required' => 'O nome do cargo é obrigatório.',
            'jobs_name.string' => 'O nome do cargo deve ser uma string válida.'
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new ValidationException(
            $validator,
            response()->json([
                'status' => 424,
                'message' => 'Erro na validação dos dados.',
                'errors' => $validator->errors(),
            ]),
        );
    }
}
