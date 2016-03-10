<?php

use Illuminate\Database\Seeder;

class GoalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(env('APP_ENV') !== "production") {
            $faker = Faker\Factory::create();

            foreach(range(1,500) as $n) {
                \App\Goal::create([
                    'text' => $faker->text(50),
                    'curator_email' => 'moriana.mitxel@gmail.com',
                    'check_at' => $faker->dateTimeBetween('-1 year','1 year')
                ]);
            }
        } else {
            $this->command->info('Goals table should not be seeded in production env');
        }
    }
}
