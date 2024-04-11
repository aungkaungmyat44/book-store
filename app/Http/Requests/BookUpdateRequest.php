<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookUpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'unique_id' => 'required|string',
            'content_owner_id' => 'required|exists:content_owners,id',
            'publisher_id' => 'required|exists:publishers,id',
            'cover_photo' => !empty($this->input('cover_photo')) ? ['nullable'] : ['image','mimes:jpeg,bmp,png,jpg','max:5000']
        ];
    }
}
