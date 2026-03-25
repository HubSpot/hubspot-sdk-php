<?php

declare(strict_types=1);

namespace HubspotSDK\Events\RelativeComparativeTimestampRefineBy;

enum Comparison: string
{
    case AFTER = 'AFTER';

    case BEFORE = 'BEFORE';
}
