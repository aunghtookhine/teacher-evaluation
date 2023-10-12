<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateYearRequest extends FormRequest
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
            'year' => 'required|min:9|unique:years,year,null,null,semester,' . $this->input('semester') . ',status,' . $this->input('status')
        ];
    }

    public function messages(): array
    {
        return [
            'year.unique' => 'The academic year you want to update is existed.',
        ];
    }
}
