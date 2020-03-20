<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Factory::create();

        foreach(range(1, 5) as $index) {
            $user = new User;
            $user->name = $faker->name;
            $user->email = $faker->email;
            $user->password = 'password';
            $user->location = $faker->country;
            $user->save();
        }
    }
}
