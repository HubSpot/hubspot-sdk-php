<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions\DatePropertyOperation;

enum Operator: string
{
    case EQUAL = 'EQUAL';

    case BEFORE = 'BEFORE';

    case AFTER = 'AFTER';
}
