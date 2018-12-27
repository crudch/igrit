<?php

namespace App\Requests;

use Crudch\Http\FormRequest;

class TestRequest extends FormRequest
{
    protected static $messages = [
        'name.email' => 'Fuck you Spilberg'
    ];
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|email',
            'foo' => 'required|max:5'
        ];
    }
}
