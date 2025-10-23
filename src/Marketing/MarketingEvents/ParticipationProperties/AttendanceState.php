<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\MarketingEvents\ParticipationProperties;

enum AttendanceState: string
{
    case REGISTERED = 'REGISTERED';

    case ATTENDED = 'ATTENDED';

    case CANCELLED = 'CANCELLED';

    case EMPTY = 'EMPTY';

    case NO_SHOW = 'NO_SHOW';
}
