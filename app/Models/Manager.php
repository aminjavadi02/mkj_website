<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Manager extends Model
{
    use HasFactory;
    protected $table = 'managers';
    public $timestamps = false;

    protected $fillable = [
        'name_fa',
        'name_en',
        'position_fa',
        'position_en',
        'about_fa',
        'about_en',
        'image_name',
    ];
}
