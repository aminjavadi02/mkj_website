<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'gallery';
    public $timestamps = false;

    protected $fillable = [
        'description_fa',
        'description_en',
        'name',
    ];
    
}
