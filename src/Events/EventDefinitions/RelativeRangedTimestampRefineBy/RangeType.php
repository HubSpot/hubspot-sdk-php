<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions\RelativeRangedTimestampRefineBy;

enum RangeType: string
{
    case BETWEEN = 'BETWEEN';

    case NOT_BETWEEN = 'NOT_BETWEEN';
}
