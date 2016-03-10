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
         $this->call(ReligionsTableSeeder::class);
         $this->call(RecipientsTableSeeder::class);
         $this->call(GoalsTableSeeder::class);
         $this->call(PleasTableSeeder::class);
    }
}
