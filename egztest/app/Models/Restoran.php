<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restoran extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'city', 'adress', 'workhours'];

    public function dishes(){
        return $this->hasMany(Dish::class, 'restoran_id', 'id');
    }
}

