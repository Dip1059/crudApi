<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataRequest extends FormRequest
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
        if($this->first_name){
            $rules['first_name']='required|max:15';
        }
        if($this->last_name){
            $rules['last_name']='required|max:15';
        }
        if($this->email){
            $rules['email']='required|email|unique:users';
        }
        if($this->address){
            $rules['address']='required';
        }
        if($this->age){
            $rules['age']='required|numeric';
        }
        if($this->password){
            $rules['password']='required|min:8|confirmed';
        }
        if($this->password_confirmation){
            $rules['password_confirmation']='required';
        }

        return $rules;
    }
}
