<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEnrollmentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'student_id' => [
                'required',
                'exists:students,id',
                Rule::unique('enrollments')
                    ->where('classroom_id', $this->classroom_id)
                    ->ignore($this->enrollment->id)
            ],
            'classroom_id' => 'required|exists:classrooms,id'
        ];
    }
}
