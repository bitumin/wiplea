<?php

use Illuminate\Database\Seeder;

class ReligionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(config('seeders.religions') as $religion) {
            \App\Religion::create([
                'name' => $religion
            ]);
        }
    }
}
