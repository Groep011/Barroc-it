<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =  \Faker\Factory::create();
        for($i = 0;$i < 1000; $i++)
        {
            DB::table('users')->insert([
                'name'      =>  $faker->name(),
                'email'     =>  $faker->email(),
                'password'  =>  $faker->password()
            ]);

            DB::table('custormers')->insert([
                'name'          =>$faker->company(),
                'phone_nr'          =>$faker->phoneNumber(),
                'city'          =>$faker->city(),
                'street'          =>$faker->streetName(),
                'house_nr'          =>$faker->buildingNumber(),
                'bank_acount'          =>$faker->bankAccountNumber(),
                'credible'          => 1,
                'created_at'          =>now()
            ]);

            DB::table('projects')->insert([
                'klant_nr'      =>  $faker->numberBetween(1,1000),
                'debt_max'      =>  $faker->numberBetween(1000,2000),
                'debt'          =>  $faker->numberBetween(0,4000),
                'ongoing'       =>  $faker->numberBetween(0,1),
                'note'          =>  $faker->text(200),
                'done'          =>  $faker->numberBetween(0,1)
            ]);
        }
        
    }
}
