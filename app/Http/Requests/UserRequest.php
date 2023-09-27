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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'fullname'=>'required',
            'email'=>'required|email:rfc,dns',
            'address' => 'required',
            'phone' => 'required|min:10|max:10',
        ];
    }
    public function messages(): array
    {
        return [
            'fullname'=>'Tên không được để trống',
            'email.required'=>'Tài khoản không được để trống',
            'email.email'=>'Email không hợp lệ',
            'address'=>'Địa chỉ không được để trống',
            'phone'=>'Số điện không được để trống',
            'phone.min'=>'Số điện thoại không hợp lệ',
            'phone.max'=>'Số điện thoại không hợp lệ'
        ];
    }
}
