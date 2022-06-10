<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    public $fillable = [
        'url',
        'slug',
        'clicks'
    ];

    public function acessos()
    {
        return $this->hasMany(Access::class, 'link_id');
    }
}
