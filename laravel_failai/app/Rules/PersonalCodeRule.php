<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PersonalCodeRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $first = ['3', '4', '5', '6'];
        $passed = false;
        if (
            (strlen($value) === 11) &&
            (in_array(substr($value, 0, 1), $first)) &&
            ((int)(substr($value, 3, 2))>0) &&
            ((int)(substr($value, 3, 2))<13) &&
            ((int)(substr($value, 5, 2)>0)) &&
            ((int)(substr($value, 5, 2)<32))){
            $passed = true;
        }
        return $passed;
    }
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Field :attribute must have length of 11 characters,
        should start with one of (3,4,5,6)';
    }
}
