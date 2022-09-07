<?php

namespace App\Http\Requests\Auth;

use App\Rules\UserExist;
use App\Rules\PasswordMatch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'account' => [
                'required',
                new UserExist,
            ],
            'password' => [
                'required',
                new PasswordMatch,
            ],
            'remember' => [
                'sometimes',
                'boolean',
            ],
        ];
    }
}
