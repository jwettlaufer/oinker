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

      foreach(range(1, 10) as $index){
      DB::table('oinks')->insert(array(
        'user_id'=>$faker->numberBetween($min = 1, $max = 5),
        'message'=>$faker->catchphrase
      ));
      }
    }
}
