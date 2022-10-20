<?php

namespace Database\Seeders;
use Faker\Factory as F;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
        $faker = F::create('lt_LT');
        $time = Carbon::now();
    DB::table('users')->insert([
        'name' => 'Bebras',
        'email' => 'bebras@gmail.com',
        'password' => Hash::make('123'),
        'created_at' => $time,
        'updated_at' => $time,
        'role'=> 1,
    ]);
    DB::table('users')->insert([
        'name' => 'Briedis',
        'email' => 'briedis@gmail.com',
        'password' => Hash::make('123'),
        'created_at' => $time,
        'updated_at' => $time,
        'role'=> 10,
    ]);

    foreach(['Aleksandro užkandinė', 'Burgeriai pas Sauliu', 'ArturoSpageti', 'DmitrijDog', 'RugerStop'] as $restoran){
        DB::table('restorans')->insert([
            'title' => $restoran,
            'created_at' => $time->addSeconds(1),
            'updated_at' => $time,

        ]);
    }
    foreach([
        'Tortas mak Tortas',
        'Balandėliai',
        'Cepelinai',
        'Ryba',
        'Kepti sliekai',
        'Morku tortas'] as $dish){
        DB::table('dishes')->insert([
            'title' => $dish,
            'price' => rand(100, 1000) /100,
            'restoran_id' => rand(1,5),
            'created_at' => $time->addSeconds(1),
            'updated_at' => $time,

        ]);
    }

        foreach(range(1, 22) as $_){
            DB::table('coments')->insert([
                'post' => $faker->paragraph(rand(1, 10)),
                'dish_id' => rand(1, 6),
                'created_at' => $time->addSeconds(1),
                'updated_at' => $time,
    
            ]);
        }


}
    }