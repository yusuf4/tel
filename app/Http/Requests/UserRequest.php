<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2',
            //'email'=>'required|email'
            'department'=> 'required'
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'Иловаи ном ҳатмист!',
            'name.min' => 'Ном на камтар аз 2 рамз бошад!',
            'email.required' => 'Иловаи номи почтаи электрони ҳатмист!',
            'department'=> 'Интихоби раёсат/намояндаги ҳатмист!'
        ];
    }
}
