<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'slug' => ['required', 'string', 'min:3', 'max:255'],
            'description' => ['nullable', 'string', 'min:3'],
            'image' => ['nullable'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'color' => ['nullable', Rule::in(['Red', 'Blue', 'Yellow','Black','Brown','Pink','Grey'])],
            'size' => ['nullable', Rule::in(['XXS','XS', 'S', 'M','L','XL','XXL'])],
            'price' => ['required', 'integer', 'min:0'],
            'status_id' => ['required', 'integer', 'exists:statuses,id'],
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
//            'in_array' => ':attribute has to be from array :in_array',
//            'exists' => ':attribute has to match any of :exists',
            // ....
        ];
    }
}
