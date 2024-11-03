<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\UserTypeEnum;
use Illuminate\Validation\Rules\Password;

class UserStoreRequest extends FormRequest
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
            'first_name' => ['required','string','min:3','max:255'],
            'last_name' => ['required','string','min:3','max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users,email'],
            'phone' => ['required_with:email','numeric','digits_between:8,15'],
            'role' => ['required','numeric','in:'.implode(',',UserTypeEnum::values())],
            'department_id' => ['required_if:role,==,'.UserTypeEnum::EMPLOYEE->value,'numeric','exists:departments,id'],
            'salary' => ['required','numeric','gte:0','lte:1000000'],
            'password' => ['required','confirmed',Password::min(8)->numbers()->letters()->mixedCase()->symbols()],
            'image' => ['sometimes','nullable','image','mimes:jpg,jpeg,png','max:2048'],
        ];
    }
}
