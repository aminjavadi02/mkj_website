<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallInfo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'call_info';
    protected $fillable= [
        'name_fa',
        'name_en',
        'position_fa',
        'position_en',
        'phone_number'
    ];
}
