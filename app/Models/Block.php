<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Block extends Model
{
    use HasFactory;
    protected $casts = [
        'gallery' => 'array',
        'repeater' => 'array',
    ];
    protected $fillable = [
        'title',
        'name',
        'preview',
        'content',
        'content2',
        'gallery',
        'type',
        'repeater',
    ];
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'block_post','block_id', 'post_id');
    }
}
