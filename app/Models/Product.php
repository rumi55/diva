<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model 
{
    use HasFactory;
  

    /**
     * @var string
     */
    protected $table = 'shop_products';

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'preview',
        'content',
        'content2',
        'featured',
        'is_visible',
        'type',
        'published_at',
        'seo_title',
        'seo_description',
        'position',
        'attachment',
        'gallery',
    ];
    

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'featured' => 'boolean',
        'is_visible' => 'boolean',
        'backorder' => 'boolean',
        'requires_shipping' => 'boolean',
        'published_at' => 'date',
        'gallery' => 'array',
        'attachment' => 'array',
    ];

   
    public function category(): BelongsTo
    {
        return $this->belongsTo(Shopcategory::class, 'shop_category_id');
    }



    // public function categories(): BelongsToMany
    // {
    //     return $this->belongsToMany(Category::class, 'shop_category_product', 'shop_category_id', 'shop_product_id');
    // }

    

    
}
