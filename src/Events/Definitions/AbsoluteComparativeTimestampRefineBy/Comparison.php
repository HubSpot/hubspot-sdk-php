<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Definitions\AbsoluteComparativeTimestampRefineBy;

enum Comparison: string
{
    case AFTER = 'AFTER';

    case BEFORE = 'BEFORE';
}
