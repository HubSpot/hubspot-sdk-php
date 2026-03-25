<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Filter;

/**
 * The comparison operator used in the filter, such as "EQ" or "GT".
 */
enum Operator: string
{
    case BETWEEN = 'BETWEEN';

    case CONTAINS_TOKEN = 'CONTAINS_TOKEN';

    case EQ = 'EQ';

    case GT = 'GT';

    case GTE = 'GTE';

    case HAS_PROPERTY = 'HAS_PROPERTY';

    case IN = 'IN';

    case LT = 'LT';

    case LTE = 'LTE';

    case NEQ = 'NEQ';

    case NOT_CONTAINS_TOKEN = 'NOT_CONTAINS_TOKEN';

    case NOT_HAS_PROPERTY = 'NOT_HAS_PROPERTY';

    case NOT_IN = 'NOT_IN';
}
