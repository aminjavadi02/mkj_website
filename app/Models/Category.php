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
        return $this->hasMany(Category::class,'parent_id')->with('children');
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

    public static function fathers($category)
    {
        $category = Category::find($category);
        $tree[0] = [
            'id'=>$category->id,
            'name'=>$category->name_fa,
        ];
        $i = 1;
        while($category->parent_id){
            $category = Category::find($category->parent_id);
            $tree[$i] = [
                'id'=>$category->id,
                'name'=>$category->name_fa,
            ];
            $i+=1;
        }
        return $tree;
    }

    public static function getallchildren($cat,&$list)
    { // pass list by refrence to change it : &$lsit
        foreach($cat->children as $child){
            if(count($child->children)>0){
                Category::getallchildren($child,$list);
                array_push($list,$child);
            }
            else{
                array_push($list,$child);
            }
        }
        // this function must not return anyhig cuz it is used recursively. allChildren() returns the needed value.
        // this function changes the reference of $list so that in allChildren() the $list be changed.
    }
    public static function allChildren($cat)
    {
        $list[0] = $cat;
        Category::getallchildren($cat,$list);
        return $list;
    }
}
