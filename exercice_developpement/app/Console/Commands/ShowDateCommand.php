<?php

namespace App\Console\Commands;

use App\Scripts\TimeHour;
use Illuminate\Console\Command;
use Ramsey\Uuid\Type\Time;

class ShowDateCommand extends Command
{
    protected $signature = 'show:date';

    protected $description = 'Command description';

    public function handle(): void
    {
        $timeHour = new TimeHour();
        $this->comment("La date et l'heure actuelle est: " . $timeHour->getDateAndActualHour());
    }
}
