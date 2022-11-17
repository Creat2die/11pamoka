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

        //fakeri isikvečiam kad feikint
        $faker = F::create('lt_LT');
        // carbonas skirtas laikui time
        $time = Carbon::now();

        DB::table('users')->insert([
            'name' => 'Bebras',
            'email' => 'bebras@gmail.com',
            'password' => Hash::make('123'),
            'created_at' => $time,
            'updated_at' => $time,
           // 'role'=> 10,
        ]);
        DB::table('users')->insert([
            'name' => 'Briedis',
            'email' => 'Briedis@gmail.com',
            'password' => Hash::make('123'),
            'created_at' => $time,
            'updated_at' => $time,
           // 'role'=> 1,
        ]);

        foreach(['Lithuania', 'Turkey', 'Germany', ] as $country){
            DB::table('countries')->insert([
                'name' => $country,
                'seazon' => 'Visa sezona',
                'created_at' => $time->addSeconds(1),
                'updated_at' => $time,
            ]);
        }
        foreach(['Namai namučiai', 'KaipNamie', 'PlazaLaza' ] as $hotel){
            DB::table('hotels')->insert([
                'name' => $hotel,
                'price' => rand(2,500),
                'term' => rand(1,20) .' days',
                'country_id' => rand(1,3),
                'created_at' => $time->addSeconds(1),
                'updated_at' => $time,
            ]);
        }
    }
}
