<?php

namespace App\Requests;

use Crudch\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    protected static $messages = [
        'email.required' => 'Пожалуйста, укажите Ваш email адрес',
        'email.email'    => 'Пожалуйста, введите корректный email адрес',
        'email.exists'   => 'Такого пользователя не существует',
    ];

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'email'      => 'email|unique:users',
            'first_name' => 'min:3',
            'password'   => 'min:3',
        ];
    }
}
