<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;;

class StoreReviewRequest extends BaseFormRequest
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
            'score' => 'required|integer|between:0,10',
            'body' => 'required|string|min:1|max:511',
            'username' => 'required|string|min:1|max:127'
        ];
    }
}
