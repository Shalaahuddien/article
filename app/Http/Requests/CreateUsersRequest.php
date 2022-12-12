<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class CreateUsersRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email'     => ['required', 'email', 'unique:users,email'],
            'username'  => ['required', 'alpha_num', 'unique:users,username'],
            'password'  => ['required', Password::min(8)->numbers()]
        ];
    }
    public function messages()
    {
        return [
            'email.email'           => 'Email anda tidak valid.',
            'username.required'     => 'Username wajib diisi.',
            'email.required'        => 'Email wajib diisi.',
            'password.required'     => 'Password wajib diisi.',
            'username.alpha_num'    => 'Username hanya boleh huruf dan angka',
            'unique'                => 'Data sudah digunakan.',
        ];
    }
}
