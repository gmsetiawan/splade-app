<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:100', 'min:3'],
            'middle_name' => ['required', 'string', 'max:100', 'min:3'],
            'last_name' => ['required', 'string', 'max:100', 'min:3'],
            'zip_code' => ['required'],
            'department_id' => ['required', 'exists:departments,id'],
            'city_id' => ['required', 'exists:cities,id'],
            'birth_date' => ['required', 'date'],
            'date_hired' => ['required', 'date'],
        ];
    }
}
