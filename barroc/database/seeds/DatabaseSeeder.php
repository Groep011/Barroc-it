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
                'name'              =>  $faker->name(),
                'email'             =>  $faker->email(),
                'password'          =>  $faker->password()
            ]);

            DB::table('custormers')->insert([
                'name'              =>$faker->company(),
                'phone_nr'          =>$faker->phoneNumber(),
                'city'              =>$faker->city(),
                'street'            =>$faker->streetName(),
                'house_nr'          =>$faker->buildingNumber(),
                'bank_acount'       =>$faker->bankAccountNumber(),
                'credible'          => 1,
                'created_at'        => now()
            ]);

            DB::table('projects')->insert([
                'klant_nr'          =>  $faker->numberBetween(1,1000),
                'name'              =>  $faker->word(),
                'dept_max'          =>  $faker->numberBetween(1000,2000),
                'debt'              =>  $faker->numberBetween(0,4000),
                'ongoing'           => $faker->randomElement(['T' ,'F']),
                'note'              =>  $faker->text(200),
                'done'              =>  $faker->randomElement(['T', 'F'])
            ]);

            DB::table('custormers_projects')->insert([
                'custormer_id'      => ($i + 2000),
                'project_id'        => $faker->numberBetween(1,1000),
                'created_at'        => now()
                ]);
        }
    }
}
