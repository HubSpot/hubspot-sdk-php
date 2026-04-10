<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions\BoolPropertyOperation;

enum Operator: string
{
    case HAS_EVER_BEEN_EQUAL_TO = 'HAS_EVER_BEEN_EQUAL_TO';

    case HAS_NEVER_BEEN_EQUAL_TO = 'HAS_NEVER_BEEN_EQUAL_TO';

    case IS_EQUAL_TO = 'IS_EQUAL_TO';

    case IS_NOT_EQUAL_TO = 'IS_NOT_EQUAL_TO';
}
