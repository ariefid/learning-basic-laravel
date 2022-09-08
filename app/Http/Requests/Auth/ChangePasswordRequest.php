<?php

namespace App\Http\Requests\Auth;

use App\Rules\ChangePasswordMatch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'currentpassword' => [
                'required',
                Password::defaults(),
                new ChangePasswordMatch,
            ],
            'newpassword' => [
                'required',
                Password::defaults(),
                'confirmed',
            ],
        ];
    }
}
