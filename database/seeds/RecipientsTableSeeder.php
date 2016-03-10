<?php

use Illuminate\Database\Seeder;

class RecipientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(config('seeders.recipients') as $religion => $recipients) {
            $religion_id = \App\Religion::where('name', $religion)->first()->value('id');
            if(!empty($religion_id))
                foreach($recipients as $recipient)
                    \App\Recipient::create([
                        'name' => $recipient,
                        'religion_id' => $religion_id
                    ]);
            else
                $this->command->info($religion.' not found in Religions table!');
        }
    }
}
