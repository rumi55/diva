<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Team extends Model
{
    use HasFactory;
   

    protected $fillable = [
        'title',
        'preview',
        'description',
        'content',
        'phone',
        'email',
        'position_main',
        'position_second',
        'active'
    ];
}
