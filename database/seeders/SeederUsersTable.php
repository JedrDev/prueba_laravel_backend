<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SeederUsersTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        User::factory()->count(100)->create()
            ->each(function ($user) use ($faker) {
                DB::table('user_domicilio')->insert([
                    'user_id' => $user->id,
                    'domicilio' => $faker->address,
                    'numero_exterior' => $faker->buildingNumber,
                    'colonia' => $faker->secondaryAddress,
                    'codigo_postal' => $faker->postcode,
                    'ciudad' => $faker->city,
                ]);
            });
    }
}
