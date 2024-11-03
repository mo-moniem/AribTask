<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required',Password::min(8)->numbers()->letters()->mixedCase()->symbols()],
            'remember' => ['sometimes', 'string','in:on'],
        ];
    }
}
