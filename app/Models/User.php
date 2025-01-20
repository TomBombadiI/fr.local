<?php

namespace App\Models;

use PHPFramework\Model;

class User extends Model
{
    protected array $fillable = [
        'name',
        'email',
        'password',
        'confirm_password'
    ];

    protected array $rules = [
        'required' => ['name', 'email', 'password', 'confirm_password'],
        'email' => ['email'],
        'lengthMin' => [
            ['password', 6],
        ],
        'equals' => [
            ['confirm_password', 'password'],
        ]
    ];

    protected array $labels = [
        'name' => 'Имя',
        'email' => 'E-mail',
        'password' => 'Пароль',
        'confirm_password' => 'Подтверждение пароля',
    ];

}