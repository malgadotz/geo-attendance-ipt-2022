<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SessionRequest extends FormRequest
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
            'activity_name'=>['string','required'],
            'course_id'=>['integer','required'],
            'program_id'=>['integer','required'],
            'venueid'=>['integer','required'],
            'staff_id'=>['integer'],
            'year_level'=>['integer'],

            // 'date' => 'required|date|date_format:Y-n-j',
            'date'=>['required','date'],
            'start_time' => ['date_format:H:i'],
            'end_time' => ['date_format:H:i','after:start_time'],
        ];
    }
}
