<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'category_id', 'ISBN', 'pages'];

    const SORT_SELECT = [
        ['title_asc', 'Title A-Z'], 
        ['title_desc', 'Title Z-A'], 
        ['pages_asc', 'Pages MIN-MAX'], 
        ['pages_desc', 'Pages MAX-MIN'], 
    ];

    public function getCategory(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
