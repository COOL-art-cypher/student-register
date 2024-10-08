<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarkingStoreRequest extends FormRequest
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
            'name' => 'required',
            'roll_number' => 'required',
            'semester' => 'required',
            'total_gp' => 'required',
            'gpa' => 'required',
            'marks' => 'required|array',
            'marks.myanmar.*' => 'required',
            'marks.english.*' => 'required',
            'marks.physics.*' => 'required',
            'marks.PIT.*' => 'required',
            'marks.math.*' => 'required',
            'marks.MS.*' => 'required',
        ];
    }
}
