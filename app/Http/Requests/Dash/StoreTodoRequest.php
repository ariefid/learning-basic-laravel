<?php

namespace App\Http\Requests\Dash;

use App\Enums\TodoState;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;

class StoreTodoRequest extends FormRequest
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
        $notRegex = "/<[a-z][\s\S]*>/";

        return [
            'name' => [
                'required',
                'min:5',
                'max:100',
            ],
            'description' => [
                'sometimes',
                'not_regex:' . $notRegex,
            ],
            'is_private' => [
                'sometimes',
                'boolean',
            ],
            'state' => [
                'required',
                new Enum(TodoState::class),
            ],
        ];
    }
}
