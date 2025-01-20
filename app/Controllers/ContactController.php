<?php

namespace App\Controllers;

class ContactController extends BaseController
{
    public function index()
    {
        return view('contact', ['title' => 'Страница контактов']);
    }

    public function send()
    {
        $model = new \App\Models\Contact();
        $model->loadData();

        dump($model);
    }
}
