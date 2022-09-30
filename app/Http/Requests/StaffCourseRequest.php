<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffCourseRequest extends FormRequest
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
            'staff_id'=>['integer','required'],
            'course_id'=>['integer','required'],
            'program_id'=>['integer','required',],
            'year_level'=> ['integer','required'],
        ];
    }
}
