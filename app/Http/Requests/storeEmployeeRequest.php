<?php
namespace App\Http\Requests;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class storeEmployeeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['string','required'],
            'email' =>['string','required','unique:employees,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => ['image','required'],
            'company' =>['required',"exists:companies,id"]
        ];
    }
}
