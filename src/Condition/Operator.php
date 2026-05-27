<?php

declare(strict_types=1);

namespace HubSpotSDK\Condition;

/**
 * A string specifying the operation to be performed in the condition. Valid values include 'EQ', 'N_EQ', 'LT', 'GT', 'LTE', 'GTE', 'CONTAINS', 'STARTS_WITH', 'ENDS_WITH', 'IN', 'NOT_IN', 'IS_EMPTY', and 'IS_NOT_EMPTY'.
 */
enum Operator: string
{
    case CONTAINS = 'CONTAINS';

    case ENDS_WITH = 'ENDS_WITH';

    case EQ = 'EQ';

    case GT = 'GT';

    case GTE = 'GTE';

    case IN = 'IN';

    case IS_EMPTY = 'IS_EMPTY';

    case IS_NOT_EMPTY = 'IS_NOT_EMPTY';

    case LT = 'LT';

    case LTE = 'LTE';

    case N_EQ = 'N_EQ';

    case NOT_IN = 'NOT_IN';

    case STARTS_WITH = 'STARTS_WITH';
}
