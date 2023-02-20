<?php

namespace App\Http\Requests\Admin\TrainingRequests;

use Illuminate\Foundation\Http\FormRequest;

class TrainingStoreRequest extends FormRequest
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
            'instructor' => 'required',
            'date_from' => 'required',
            'date_to' => 'required',
            'name_ar' => 'required',
            'time_started' => 'required',
            'days' => 'required',
            // 'title_ar' => 'required',
            'description_ar' => 'required',
        ];
    }
}
