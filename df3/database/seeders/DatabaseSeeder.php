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


    foreach([
        'Total Recall 2',
        'Tom and Tom 3',
        'Cobra and Robocop',
        'Shark and Cats',
        'Pinkis ir Makaule',
        'Sparta 11'] as $movie){
        DB::table('movies')->insert([
            'title' => $movie,
            'price' => rand(100, 1000) /100,
            'created_at' => $time->addSeconds(1),
            'updated_at' => $time,

        ]);
    }
    foreach([
        'Nice',
        'Very Vice',
        'Animalistic',
        '18+',
        'Very Blue ',
        'Perfect'] as $tag){
        DB::table('tags')->insert([
            'title' => $tag,
            'created_at' => $time->addSeconds(1),
            'updated_at' => $time,

        ]);
    }

        foreach(range(1, 22) as $_){
            DB::table('coments')->insert([
                'post' => $faker->paragraph(rand(1, 10)),
                'movie_id' => rand(1, 6),
                'created_at' => $time->addSeconds(1),
                'updated_at' => $time,
    
            ]);
        }


}
    }