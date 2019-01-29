<?php

namespace App\Requests;

use Crudch\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    protected static $messages = [
        'email.required'      => 'Пожалуйста, укажите Ваш email адрес',
        'email.email'         => 'Пожалуйста, введите корректный email адрес',
        'email.unique'        => 'Такой пользователь уже существует',
        'first_name.required' => 'Пожалуйста, введите Ваше имя',
    ];

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'email'      => 'required|email|unique:users',
            'first_name' => 'required|min:3',
            'password'   => 'required|min:3',
        ];
    }
}
