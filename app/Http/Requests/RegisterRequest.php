<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email'=>'required|unique:users|email:rfc,dns',
            'password' => 'required|min:8',
        ];
    }
    public function messages(): array
    {
        return [
            'email.required'=>'Tài khoản không được để trống',
            'email.email'=>'Email không hợp lệ',
            'email.unique' => 'Email đã tồn tại',
            'password.required'=>'Mật khẩu không được để trống',
            'password.min'=>'Mật khẩu phải từ 8 ký tự'
        ];
    }

}
