<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class RequestStatus extends Enum
{
    const WAITING =  1;
    const MATCHED =  2;
    const BOOKED = 3;
    const COMPLETED = 4;
    const CANCELED = -1;
}
