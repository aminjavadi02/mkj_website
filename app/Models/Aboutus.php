<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Aboutus extends Model
{
    use HasFactory;
    protected $table = 'aboutus';
    public $timestamps = false;

    protected $fillable = [
        "history_en",
        "history_fa",
        'factory_phone',
        'office_phone',
        "office_address_en",
        "office_address_fa",
        "factory_address_en",
        "factory_address_fa",
        "google_location_factory",
        "google_location_office",
        "image_name",
    ];
}
