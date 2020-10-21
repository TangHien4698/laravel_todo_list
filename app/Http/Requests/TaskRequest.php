<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'name' => 'bail|required|unique:tasks|max:255',
            'user_id' => 'exists:App\Model\User,id',
            'category_id' => 'exists:App\Model\Category,id'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute khong đuoc bo trong',
            'unique' => ':attribute da ton tai ! ',
            'name.max' => 'Truong ten chi duoc nhap toi da 255 ki tu',
            'user_id.exists' => 'User khong ton tai',
            'category_id.exists' => 'Category khong ton tai',
        ];
    }
}
