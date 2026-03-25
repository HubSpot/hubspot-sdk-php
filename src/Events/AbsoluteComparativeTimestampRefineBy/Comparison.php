<?php

declare(strict_types=1);

namespace HubspotSDK\Events\AbsoluteComparativeTimestampRefineBy;

enum Comparison: string
{
    case AFTER = 'AFTER';

    case BEFORE = 'BEFORE';
}
