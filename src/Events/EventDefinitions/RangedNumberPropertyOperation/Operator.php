<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions\RangedNumberPropertyOperation;

enum Operator: string
{
    case IS_BETWEEN = 'IS_BETWEEN';

    case IS_NOT_BETWEEN = 'IS_NOT_BETWEEN';
}
