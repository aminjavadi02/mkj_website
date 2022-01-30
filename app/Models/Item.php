<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\itemImage;
use App\Models\Packages;

class Item extends Model
{
    use HasFactory;
    protected $table = 'items';
    public $timestamps = false;

    protected $fillable=[
        'name_fa',
        'name_en',
        'description_fa',
        'description_en',
        'size',
        'packages_id',
        'category_id',
    ];

    // item m - n package

    public function packages()
    {
        return $this->belongsToMany(Packages::class);
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
