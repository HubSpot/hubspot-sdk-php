<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions\RollingDateRangePropertyOperation;

enum Operator: string
{
    case IS_LESS_THAN_X_DAYS_AGO = 'IS_LESS_THAN_X_DAYS_AGO';

    case IS_LESS_THAN_X_DAYS_FROM_NOW = 'IS_LESS_THAN_X_DAYS_FROM_NOW';

    case IS_MORE_THAN_X_DAYS_AGO = 'IS_MORE_THAN_X_DAYS_AGO';

    case IS_MORE_THAN_X_DAYS_FROM_NOW = 'IS_MORE_THAN_X_DAYS_FROM_NOW';
}
