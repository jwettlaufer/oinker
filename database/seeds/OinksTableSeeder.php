<?php

use Illuminate\Database\Seeder;

class OinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();

      foreach(range(1, 20) as $index){
      DB::table('oinks')->insert(array(
        'user_id'=>$faker->numberBetween($min = 1, $max = 20),
        'message'=>$faker->catchphrase
      ));
      }
    }
}
