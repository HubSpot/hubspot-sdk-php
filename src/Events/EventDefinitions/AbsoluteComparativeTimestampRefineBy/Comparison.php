<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions\AbsoluteComparativeTimestampRefineBy;

enum Comparison: string
{
    case BEFORE = 'BEFORE';

    case AFTER = 'AFTER';
}
