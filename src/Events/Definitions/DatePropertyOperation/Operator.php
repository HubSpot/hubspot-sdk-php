<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions\DatePropertyOperation;

enum Operator: string
{
    case AFTER = 'AFTER';

    case BEFORE = 'BEFORE';

    case EQUAL = 'EQUAL';
}
