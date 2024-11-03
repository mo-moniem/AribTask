<?php

namespace App\Http\Requests;

use App\Enums\UserTypeEnum;
use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'title' => ['required', 'string','min:3', 'max:255'],
            'manager_id' => ['required','numeric','exists:users,id'],
        ];
    }
}
