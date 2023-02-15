<?php

namespace App\Http\Requests;

use App\Rules\PersonalCodeRule;
use Illuminate\Foundation\Http\FormRequest;

class PersonUpdateRequest extends FormRequest
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
            'name' => ['required','string','min:3','max:255'],
            'surname' => ['required','string','min:3','max:255'],
            'personal_code' => ['sometimes','required','string',new PersonalCodeRule()],
            'email' => ['sometimes','required', 'email'],
            'phone' => ['sometimes','nullable'],
            'user_id'       => ['sometimes', 'integer', 'exists:users,id'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => ':attribute is required',
            'string' => ':attribute has to be made from characters',
            'min' => 'Min :attribute length :min symbols',
            'max' => 'Max :attribute length :max symbols',
            'integer' => ':attribute has to be integer',
            'size'=> ':attribute must have length of :size symbols',
            // ....
        ];
    }
}

