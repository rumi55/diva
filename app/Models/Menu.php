<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $casts = [
        'repeater' => 'array',
    ];

    protected $fillable = [
        'name',
        'title',
        'type',
        'repeater',
        'position',
    ];
}
