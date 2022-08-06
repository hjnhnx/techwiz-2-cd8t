<?php


namespace App\Enums;

use BenSampo\Enum\Enum;

class EmailPreference extends Enum
{
    const NO_EMAIL = 0;
    const ONLY_RIDE_EMAIL = 1;
    const ALL_EMAIL = 2;
}
