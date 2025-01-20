<?php

namespace App\Models;

use PHPFramework\Model;

class Contact extends Model
{

    public array $fillable = ['email', 'content'];

}