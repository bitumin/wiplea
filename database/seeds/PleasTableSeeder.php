<?php

use Illuminate\Database\Seeder;

class PleasTableSeeder extends Seeder
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
            $recipients = \App\Recipient::all()->pluck('id')->toArray();
            $goals = \App\Goal::all();

            foreach($goals as $goal) {
                \App\Plea::create([
                    'text' => $faker->text(),
                    'success' => ($goal->check_at < \Carbon\Carbon::now()) ? $faker->boolean(50) : null,
                    'goal_id' => $goal->id,
                    'recipient_id' => $recipients[array_rand($recipients)]
                ]);
            }
        } else {
            $this->command->info('Pleas table should not be seeded in production env');
        }
    }
}
