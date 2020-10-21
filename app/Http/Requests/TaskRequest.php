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
            'name_task' => 'bail|required|unique:tasks|max:255',
            'id_user' => 'exists:App\Model\User,id',
            'id_category' => 'exists:App\Model\Category,id_cat'
        ];
    }
}
