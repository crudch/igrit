<?php

namespace App\Requests;

use Crudch\Http\FormRequest;

class TestRequest extends FormRequest
{
    protected static $messages = [
        'foo.email' => 'Test for Foo'
    ];
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'foo' => 'required|email',
            'bar' => 'required|max:5'
        ];
    }
}
