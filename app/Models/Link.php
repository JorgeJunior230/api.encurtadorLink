<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use UserModel;

class Link extends UserModel
{
    public $fillable = [
        'url',
        'slug'
    ];
}
