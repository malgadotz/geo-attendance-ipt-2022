<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeotableRequest extends FormRequest
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
            'venue_id'=>['integer','unique:geotable'],
            'min_lat'=>['numeric','required'],
            'max_lat'=>['numeric','required'],
            'min_long'=>['numeric','required'],
            'max_long'=>['numeric','required'],
        ];
    }
}
