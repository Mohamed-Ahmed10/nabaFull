<?php

namespace App\Http\Requests\Admin\SliderRequests;

use Illuminate\Foundation\Http\FormRequest;

class SliderStoreRequest extends FormRequest
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
            'title_ar' => 'required',
            'image' => 'required',
            'image_mobile' => 'required',
            'description_ar' => 'required',
            'link' => 'required'
        ];
    }
}
