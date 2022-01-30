<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Packages extends Model
{
    use HasFactory;
    //  many to many with items
    protected $table = 'packages';
    public $timestamps = false;
    protected $fillable=[
        'name_fa',
        'name_en',
    ];

    // relation to items
    public function items()
    {
        return $this->belongsToMany(Item::class);
    }
}
