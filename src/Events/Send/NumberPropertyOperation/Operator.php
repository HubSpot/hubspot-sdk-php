<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Send\NumberPropertyOperation;

enum Operator: string
{
    case HAS_EVER_BEEN_EQUAL_TO = 'HAS_EVER_BEEN_EQUAL_TO';

    case HAS_NEVER_BEEN_EQUAL_TO = 'HAS_NEVER_BEEN_EQUAL_TO';

    case IS_EQUAL_TO = 'IS_EQUAL_TO';

    case IS_GREATER_THAN = 'IS_GREATER_THAN';

    case IS_GREATER_THAN_OR_EQUAL_TO = 'IS_GREATER_THAN_OR_EQUAL_TO';

    case IS_LESS_THAN = 'IS_LESS_THAN';

    case IS_LESS_THAN_OR_EQUAL_TO = 'IS_LESS_THAN_OR_EQUAL_TO';

    case IS_NOT_EQUAL_TO = 'IS_NOT_EQUAL_TO';
}
