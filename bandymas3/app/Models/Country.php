<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'seazon'];

    public function getHotels(){
        return $this->hasMany(Hotel::class, 'hotel_id', 'id');
    }
}
