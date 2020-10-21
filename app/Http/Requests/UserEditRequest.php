<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            //
            'name' => 'bail|required|max:255',
            'email' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute khong đuoc bo trong',
            'name.max' => 'Truong ten chi duoc nhap toi da 255 ki tu',
        ];
    }
}
