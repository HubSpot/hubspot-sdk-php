<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions\ComparativePropertyUpdatedOperation;

enum Operator: string
{
    case IS_AFTER = 'IS_AFTER';

    case IS_BEFORE = 'IS_BEFORE';
}
