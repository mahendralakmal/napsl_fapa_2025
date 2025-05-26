<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PhoneNumber implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }
    public function passes($attribute, $value)
    {
        // Implement your phone number validation logic here
        // Example: Check if the value is a valid phone number
        return preg_match('/^[0-9]{10}$/', $value);
    }

    public function message()
    {
        return 'The :attribute must be a valid phone number.';
    }
}
