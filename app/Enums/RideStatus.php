<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class RideStatus extends Enum
{
    const PENDING = 1;
    const CONFIRMED = 2;
    const MATCHED = 3;
    const BOOKED = 4;
    const COMPLETED = 5;
    const CANCELED = 6;
}
