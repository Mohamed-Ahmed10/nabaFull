<?php

namespace App\Http\Requests\Admin\ProductRequests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'second_title_ar' => 'required',
            'description_ar' => 'required',
            'second_description_ar' => 'required',
            'video_title_ar' => 'required',
            'video_description_ar' => 'required',
            // 'category_id' => 'required|exists:categories,id',
            'video_link' => 'required',
            'image' => 'required',
            'color_title' => 'required',
        ];
    }
}
