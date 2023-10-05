<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEvaluationRequest extends FormRequest
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
            "questionId1" => "Required",
            "questionId2" => "Required",
            "questionId3" => "Required",
            "questionId4" => "Required",
            "questionId5" => "Required",
            "questionId6" => "Required",
            "questionId7" => "Required",
            "questionId8" => "Required",
            "questionId9" => "Required",
            "questionId10" => "Required",
        ];
    }
}
