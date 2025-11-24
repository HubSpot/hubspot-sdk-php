<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions\DatePropertyOperation;

enum Operator: string
{
    case AFTER = 'AFTER';

    case BEFORE = 'BEFORE';

    case EQUAL = 'EQUAL';
}
