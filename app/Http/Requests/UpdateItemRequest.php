<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'expiry_date' => 'sometimes|nullable|date',
            'categoria_id' => 'sometimes|required|exists:categorias,id',
        ];
    }
}
