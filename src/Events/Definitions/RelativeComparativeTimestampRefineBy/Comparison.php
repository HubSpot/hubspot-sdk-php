<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions\RelativeComparativeTimestampRefineBy;

enum Comparison: string
{
    case AFTER = 'AFTER';

    case BEFORE = 'BEFORE';
}
