<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Plate;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['price', 'email', 'phone', 'full-name', 'description', 'address', 'status'];



    /**
     * The plate that belong to the order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function plates(): BelongsToMany
    {
        return $this->belongsToMany(Plate::class);
    }
}
