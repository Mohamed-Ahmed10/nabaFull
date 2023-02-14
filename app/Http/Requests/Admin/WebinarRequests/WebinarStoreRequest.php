<?php

namespace App\Http\Requests\Admin\WebinarRequests;

use Illuminate\Foundation\Http\FormRequest;

class WebinarStoreRequest extends FormRequest
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
            'image' => 'required',
            'date' => 'required',
            'time_started' => 'required',
            'hours' => 'required',
            'name_ar' => 'required',
            'title_ar' => 'required',
            'description_ar' => 'required',
        ];
    }
}
