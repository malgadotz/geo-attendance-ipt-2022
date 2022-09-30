<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCourseRequest extends FormRequest
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
            'scid'=>'integer',
            'course_id'=>['integer','required'],
            'program_id'=>['integer','required',],
            'credits'=>['string','required',],
            'status'=>['string','required',],
            'year_level'=>['integer','required'],
        ];
    }
}
