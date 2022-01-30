<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Blog extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'blog';
    protected $fillable = [
        'title',
        'slug',
        'text',
        'image_name',
    ];

}
