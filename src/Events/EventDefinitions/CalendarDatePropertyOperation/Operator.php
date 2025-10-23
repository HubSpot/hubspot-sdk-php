<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions\CalendarDatePropertyOperation;

enum Operator: string
{
    case IN_THIS_TIME_UNIT = 'IN_THIS_TIME_UNIT';

    case IN_THIS_TIME_UNIT_SO_FAR = 'IN_THIS_TIME_UNIT_SO_FAR';

    case IN_NEXT_TIME_UNIT = 'IN_NEXT_TIME_UNIT';

    case IN_LAST_TIME_UNIT = 'IN_LAST_TIME_UNIT';
}
