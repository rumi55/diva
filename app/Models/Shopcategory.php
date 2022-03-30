<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Product;

class Shopcategory extends Model 
{
    use HasFactory;


    /**
     * @var string
     */
    protected $table = 'shop_categories';

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'preview',
        'background',
        'content',
        'content2',
        'position',
        'is_visible',
        'seo_title',
        'seo_description',
        'position',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'is_visible' => 'boolean',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'id', 'shop_category_id');
    }
    public function categories()
    {
        return $this->hasMany(Shopcategory::class, 'parent_id');
    }

    public function childrenCategories(): HasMany
    {
        return $this->hasMany(Shopcategory::class, 'parent_id')->with('shop_categories');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Shopcategory::class, 'parent_id');
    }

}
