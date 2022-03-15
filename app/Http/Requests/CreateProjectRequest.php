<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
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
            'proj_title' => 'required|max:255',
            'groups_count' => 'required|max:30',
//            'stud_count' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'proj_title' => 'project title',
            'groups_count' => 'number of groups',
//            'stud_count' => 'maximum number of students',
        ];
    }
}
