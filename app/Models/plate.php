<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Plate extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'ingredients', 'description', 'plate_image', 'price', 'visibility', 'type', 'restaurant_id'];

    /**
     * Get the restaurant that owns the Plate
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }
}
