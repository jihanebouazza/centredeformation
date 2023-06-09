<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MatchOldPassword implements Rule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function passes($attribute, $value)
    {
        return password_verify($value, auth()->user()->password);
    }

    public function message()
    {
        return ' Does not match your current password.';
    }
}
