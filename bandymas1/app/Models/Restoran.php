<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restoran extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'adress', 'workhours', 'city'];

    const SORT_SELECT = [
        ['name_asc', 'Title A-Z'], 
        ['name_desc', 'Title Z-A'], 
        ['rate_asc', 'Rating 1-9'], 
        ['rate_desc', 'Rating 9-1'], 
    ];

    public function getDishes(){
        return $this->hasMany(Dish::class, 'restoran_id', 'id');
    }
}
