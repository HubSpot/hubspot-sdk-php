<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions\RollingPropertyUpdatedOperation;

enum Operator: string
{
    case UPDATED_IN_LAST_X_DAYS = 'UPDATED_IN_LAST_X_DAYS';

    case NOT_UPDATED_IN_LAST_X_DAYS = 'NOT_UPDATED_IN_LAST_X_DAYS';
}
