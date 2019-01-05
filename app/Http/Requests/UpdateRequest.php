<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        $rules=[];
        $rules['first_name']='required|max:15';
        $rules['last_name']='required|max:15';
        $rules['country']='required|max:10';
        $rules['phone']='required|max:20';
        return $rules;
    }
}
