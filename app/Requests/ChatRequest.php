<?php

namespace App\Requests;

use Crudch\Http\FormRequest;

class ChatRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'    => 'required|max:100',
            'message' => 'required',
        ];
    }
}
