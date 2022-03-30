<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
/**
 * The roles that belong to the Post
 *
 * @return 
 */




class Post extends Model
{
    use HasFactory;

    protected $casts = [
        'gallery' => 'array',
        'repeater' => 'array',
        'select' => 'array',
    ];
    
    protected $fillable = [
        'name',
        'title',
        'description',
        'seo_title',
        'seo_description',
        'slug',
        'select',
        'content',
        'content2',
        'content3',
        'preview',
        'background',
        'gallery',
        'gallery_name',
        'gallery_description',
        'type',
        'position',
        'active',
        'published_at',
        
    ];
    
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    /**
     * The roles that belong to the Post
     *
     */
    public function blocks(): BelongsToMany
    {
        return $this->belongsToMany(Block::class, 'block_post', 'post_id', 'block_id');
    }
    
}
