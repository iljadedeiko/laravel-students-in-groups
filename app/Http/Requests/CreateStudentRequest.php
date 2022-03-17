<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStudentRequest extends FormRequest
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
            'stud_full_name' => 'required|string|unique:students|max:255'
        ];
    }

    public function attributes()
    {
        return [
            'stud_full_name' => 'student full name'
        ];
    }

    public function messages()
    {
        return [
            'stud_full_name.unique' => 'This student already exists in the system'
        ];
    }
}
