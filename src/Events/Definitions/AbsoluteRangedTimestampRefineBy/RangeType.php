<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Definitions\AbsoluteRangedTimestampRefineBy;

enum RangeType: string
{
    case BETWEEN = 'BETWEEN';

    case NOT_BETWEEN = 'NOT_BETWEEN';
}
