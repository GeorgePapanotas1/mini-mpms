<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PracticeRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'name' => 'required',
            'email' => 'nullable|email',
            'logo' => 'dimensions:min_width=100,min_height=100',
            'field_of_practice' => 'array',
            'field_of_practice.*' => 'exists:App\Models\Field,id'
        ];
    }
}
