<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

        $userID = $this->route('user');

        return [
            "name" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:6",
        ];
    }

    public function messages() {
        return [
            "name.required" => "Campo nome obrigatório!",
            "email.required" => "Campo email obrigatório!",
            "email.email" => "Insira um email válido. Ex: example@site.com",
            "email.unique" => "E-mail já foi cadastrado.",
            "password.required" => "Campo senha obrigatório!",
            "password.min" => "A senha deve conter no mínimo 6 caractéres!"
        ];
    }
}
