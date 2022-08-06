<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeCompanyRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=> ["string",'required'],
            'address'=> ["string",'required'],
            'logo' => ['required','image','mimes:jpg,png,jpeg,gif,svg','max:2048'],
        ];
    }
}
