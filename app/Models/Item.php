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
    public $timestamps = true;

    protected $fillable=[
        'name_fa',
        'name_en',
        'description_fa',
        'description_en',
        'size',
        'alloy',
        'category_id',
    ];

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

    // returns all items and their images in array format
    public static function getAllImagesObject()
    {
        $items = Item::with('images')->take(4)->get();
        // gimme five of them eagerly :)
        if(count($items) > 0){
            foreach ($items as $key => $item) {
                if(count($item->images()->get()->all()) > 0 ){
                    // you have the relation, don't get it again
                    foreach ($item->images()->get()->all() as $imagekey => $image) {
                        $images[$imagekey] = [
                            'name' => $image->image_name,
                        ];
                    }
                    $itemsAndImages[$key] = [
                        'item' => $item->name_fa,
                        'images' => $images,
                    ];
                }
                else{
                    $itemsAndImages[$key] = [
                        'item' => $item->name_fa,
                        'images' => null,
                    ];
                }
            }
            return $itemsAndImages;
        }
        else{
            return null;
        }
    }
    
}
