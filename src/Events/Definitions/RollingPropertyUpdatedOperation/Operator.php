<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions\RollingPropertyUpdatedOperation;

enum Operator: string
{
    case NOT_UPDATED_IN_LAST_X_DAYS = 'NOT_UPDATED_IN_LAST_X_DAYS';

    case UPDATED_IN_LAST_X_DAYS = 'UPDATED_IN_LAST_X_DAYS';
}
