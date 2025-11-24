<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events\ParticipationProperties;

enum AttendanceState: string
{
    case ATTENDED = 'ATTENDED';

    case CANCELLED = 'CANCELLED';

    case EMPTY = 'EMPTY';

    case NO_SHOW = 'NO_SHOW';

    case REGISTERED = 'REGISTERED';
}
