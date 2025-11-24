<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions\AbsoluteComparativeTimestampRefineBy;

enum Comparison: string
{
    case AFTER = 'AFTER';

    case BEFORE = 'BEFORE';
}
