<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'categories';
    protected $fillable=[
        'name_fa',
        'name_en',
        'parent_id',
    ];

    // self-relation
    public function children(){
        return $this->hasMany(Category::class,'parent_id')->with('children')->onDelete('casecade');
    }


    // to return the tree of children
    public static function tree(){
        $allCategories = Category::get();
        $rootCategories = $allCategories->whereNull('parent_id');

        self::formatTree($rootCategories,$allCategories);

        return $rootCategories;
    }


    // to format the tree of children
    private static function formatTree($categories,$allCategories){
        foreach($categories as $category){
            $category->children = $allCategories->where('parent_id',$category->id)->values();

            if($category->children->isNotEmpty()){
                self::formatTree($category->children,$allCategories);
            }
        }
    }


    // relation to items
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}