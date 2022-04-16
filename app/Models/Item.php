<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\itemImage;
use App\Models\Packages;
use Database\Factories\ItemFactory;

class Item extends Model
{
    use HasFactory;
    protected $table = 'items';
    public $timestamps = true;

    protected $fillable=[
        'name_fa',
        'name_en',
        'description_fa',
        'description_en',
        'size',
        'alloy_fa',
        'alloy_en',
        'category_id',
    ];

    public static function newFactory()
    {
        return ItemFactory::new();
    }

    // item m - n package

    public function packages()
    {
        return $this->belongsToMany(Packages::class,'item_package','items_id','packages_id');
    }

    // item 1 - n images
    public function images()
    {
        return $this->hasMany(itemImage::class);
    }


    // relation to categories
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
