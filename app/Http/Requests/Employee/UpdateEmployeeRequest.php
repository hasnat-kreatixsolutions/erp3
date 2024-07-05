<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {

        return [
            'name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
            'cnic_number' => 'required|string|max:20',
            'email' => 'required|email',
            'dob' => 'required|date',
            'shift' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id', // Assuming department is selected from a dropdown linked to a departments table
            'hiring_date' => 'required|date',
            'salary' => 'required|numeric',
        ];
    }
}
