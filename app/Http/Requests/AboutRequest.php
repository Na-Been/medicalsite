<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
     * @param null $id
     * @return array
     */
    public function rules()
    {
        $rules = [];
        $rules +=[
            'name'=>'required',
            'description'=>'required'
        ];
        if (request()->image) {
            $rules += [
                'image' => 'required',
                'image.*' => 'mimes:jpeg,png,jpg,gif,svg,bmp,tif,tiff,eps,webp'
            ];
        }

        return $rules;
    }
}
