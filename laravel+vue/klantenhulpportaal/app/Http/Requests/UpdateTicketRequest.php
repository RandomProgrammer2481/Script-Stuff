<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'sometimes|string|between:3,255',
            'body' => 'sometimes|string|between:3,2047',
            'categories' => 'sometimes|array',
            'categories.*' => 'exists:categories,id',
            'assignee_id' => 'sometimes|integer',
            'status_id' => 'sometimes|integer|between:1,3'
        ];
    }
}
