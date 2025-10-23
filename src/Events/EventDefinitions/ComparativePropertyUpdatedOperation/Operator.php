<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions\ComparativePropertyUpdatedOperation;

enum Operator: string
{
    case IS_BEFORE = 'IS_BEFORE';

    case IS_AFTER = 'IS_AFTER';
}
