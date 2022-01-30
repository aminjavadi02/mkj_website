<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class itemImage extends Model
{
    use HasFactory;
    protected $table = 'item_images';
    public $timestamps = false;

    protected $fillable=[
        'item_id',
        'image_name',
    ];

    public function items()
    {
        return $this->belongsTo(Item::class);
    }
}
