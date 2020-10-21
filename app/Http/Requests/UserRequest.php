<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        return [
            'name' => 'bail|required|unique:users|max:255',
            'email' => 'required|unique:users',
            'password' => 'required|string|min:8'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute khong đuoc bo trong',
            'unique' => ':attribute da ton tai ! ',
            'name.max' => 'Truong ten chi duoc nhap toi da 255 ki tu',
            'password.string' => 'Vui long nhap password dung kieu du lieu',
            'password.min' => 'Password nhap toi thieu 8 ki tu'
        ];
    }
}
