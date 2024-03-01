<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory, UuidTrait;

    protected $fillable = [
        'name',
        'slug',
        'sku',
        'price',
        'price_sale',
        'status',
        'stock_status',
        'manage_stock',
        'publish_date',
        'excerpt',
        'body',
        'metas',
        'featured_image',
        'author_id',
        'category_id',
    ];

    public const DRAFT = 'DRAFT';
    public const ACTIVE = 'ACTIVE';
    public const INACTIVE = 'INACTIVE';
    public const STATUSSES = [
        self::DRAFT => 'Draft',
        self::ACTIVE => 'Active',
        self::INACTIVE => 'Inactive',
    ];

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
