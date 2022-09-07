<?php

namespace App\Rules;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\InvokableRule;

class ChangePasswordMatch implements InvokableRule
{
    /**
     * Indicates whether the rule should be implicit.
     *
     * @var bool
     */
    public $implicit = true;

    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        $user = Auth::check() ? Auth::user() : null;

        if (!empty($user)) {
            if (!Hash::check($value, $user->password)) {
                $fail('The :attribute doesn\'t match in our database.');
            }
        }
    }
}
