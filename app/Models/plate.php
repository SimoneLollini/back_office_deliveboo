<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plate extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'ingredients', 'description', 'plate_image', 'price', 'visibility', 'type'];
}
