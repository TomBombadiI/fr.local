<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends BaseController
{

    public function login()
    {
        return view("user/login", [
            'title' => 'login',
        ]);
    }

    public function register()
    {
        return view('user/register', [
            'title' => 'register',
        ]);
    }

    public function store()
    {
        $model = new User();
        dump($model->attributes);
        dump($model->validate());
        dump($model->getErrors());
        dd(request()->getData());
    }

}