<?php

namespace App\Scripts;


/**
 * La classe TimeHour permet d'afficher la date et l'heure actuelles.
 */
class TimeHour
{
    public function __construct()
    {}

    public function getDateAndActualHour(): string
    {
        return now()->toDateTimeString();
    }
}
