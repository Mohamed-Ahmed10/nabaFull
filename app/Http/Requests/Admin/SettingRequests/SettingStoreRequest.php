<?php

namespace App\Http\Requests\Admin\SettingRequests;

use Illuminate\Foundation\Http\FormRequest;

class SettingStoreRequest extends FormRequest
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
            'video_link' => 'required',
            // 'color_icon' => 'required',
        ];
    }
}
