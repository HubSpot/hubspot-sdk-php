<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions\ComparativeStringPropertyOperation;

enum Operator: string
{
    case CONTAINS = 'CONTAINS';

    case DOES_NOT_CONTAIN = 'DOES_NOT_CONTAIN';

    case ENDS_WITH = 'ENDS_WITH';

    case IS_EQUAL_TO = 'IS_EQUAL_TO';

    case IS_NOT_EQUAL_TO = 'IS_NOT_EQUAL_TO';

    case STARTS_WITH = 'STARTS_WITH';
}
