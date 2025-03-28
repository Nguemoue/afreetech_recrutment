<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ArrayTestCommand extends Command
{
    protected $signature = 'array:test';

    protected $description = 'Command description';

    public function handle(): void
    {
        $this->alert("**** Array Test Command *****");

        $data = [
            'Name' => fake()->name(),
            'Age' => fake()->randomDigitNotZero()+10,
            'Email' => fake()->email(),
            'localization' => fake()->address(),
        ];
        //notify the fields that will be created
        $this->info('The following fields will be created:');
        $this->line(collect($data)->keys()->implode(', ')."\n");

        $this->info('Données à afficher:');
        foreach ($data as $key => $value) {
            $this->line(ucfirst($key) . ': ' . $value);
        }
    }
}
