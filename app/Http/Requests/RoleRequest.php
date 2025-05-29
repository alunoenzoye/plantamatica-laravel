<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    public function authorize() {
        return true;
    }
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array {

        return [
            'name' => 'required',
        ];
    }

    public function messages(): array {
        return[
            'name.required' => 'Campo nome é obrigatório!',
        ];
    }
}
