<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Dish extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'restoran_id'];

    const SORT_SELECT = [
        ['name_asc', 'Title A-Z'], 
        ['name_desc', 'Title Z-A'], 
        ['price_asc', 'Price Z-A'], 
        ['price_desc', 'Price Z-A'], 
    ];

    public function getRestoran(){
        return $this->belongsTo(Restoran::class, 'restoran_id', 'id');
    }

    public function getPhotos(){
        return $this->hasMany(DishImage::class, 'dish_id', 'id');
    }

    public function lasImageUrl(){
        return $this->getPhotos()->orderBy('id', 'desc')->first()->url;
    }

    public function addImages(?array $photos) :self{
        if($photos){
        $dishImage =[];
        $time =Carbon::now();
        foreach($photos as $photo){
            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name. '-' . rand(100000, 999999). '.' . $ext;
            $photo->move(public_path().'/images', $file);
            $dishImage[] = [ 'url' => asset('/images') . '/' . $file,
            'dish_id' => $this->id,
            'created_at' => $time,
            'updated_at' => $time,          
            ];
        }

        DishImage::insert($dishImage);
        }
        return $this;
    }   

    public function removeImages(?array $photos) :self{
        if($photos){
            $toDelete = DishImage::whereIn('id', $photos)->get();
            foreach($toDelete as $photo){
                $file = public_path().'/images/' .pathinfo($photo->url, PATHINFO_FILENAME).'.'.pathinfo($photo->url, PATHINFO_EXTENSION);    
                if(file_exists($file)){
                    unlink($file);
                }           
            }
            DishImage::destroy($photos);
        }
        return $this;
    }

}
