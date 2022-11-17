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
            'role'=> 10,
        ]);
        DB::table('users')->insert([
            'name' => 'Briedis',
            'email' => 'Briedis@gmail.com',
            'password' => Hash::make('123'),
            'created_at' => $time,
            'updated_at' => $time,
            'role'=> 1,
        ]);


        foreach(['PapaJons', 'MorkuPasaulis', 'ValgykKolVemsi', 'Svajoniu virtuve', 'Kukuliai is taves'] as $restoran){
            DB::table('restorans')->insert([
                'name' => $restoran,
                'city' => $faker->city,
                'adress' => $faker->address,
                'workhours' => 'Nuo '.rand(8,10).':00 iki '.rand(17,24).':00',
                'created_at' => $time->addSeconds(1),
                'updated_at' => $time,
            ]);
        }

        foreach(['Makaroški', 'Sriuba su gyvuliukais', 'Lazanija', 'Ceburekai', 'Abrikosu piure', 'Keptas kalakutas', 'Vynas Tautau', 'Vagnerio upkepas', 'Dienos siurprizas', 'Abaliu pyragas', 'Sauliaus sparneliai' ] as $dish){
            DB::table('dishes')->insert([
                'name' => $dish,
                'price' => rand(2,500),
                'restoran_id' => rand(1,5),
                'created_at' => $time->addSeconds(1),
                'updated_at' => $time,
            ]);
        }
    }
}
