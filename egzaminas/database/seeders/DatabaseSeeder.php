<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as F;
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
    public function run()
    {
                $faker = F::create('lt_LT');
                $time = Carbon::now();

                DB::table('users')->insert([
                    'name' => 'Admin',
                    'email' => 'admin@gmail.com',
                    'password' => Hash::make('123'),
                    'created_at' => $time,
                    'updated_at' => $time,
                   
                ]);
                DB::table('users')->insert([
                    'name' => 'Reader',
                    'email' => 'Reader@gmail.com',
                    'password' => Hash::make('123'),
                    'created_at' => $time,
                    'updated_at' => $time,
                    
                ]);       
    }
}
