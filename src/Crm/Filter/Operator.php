<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Filter;

/**
 * The comparison operator used in the filter, such as "EQ" or "GT".
 */
enum Operator: string
{
    case EQ = 'EQ';

    case NEQ = 'NEQ';

    case LT = 'LT';

    case LTE = 'LTE';

    case GT = 'GT';

    case GTE = 'GTE';

    case BETWEEN = 'BETWEEN';

    case IN = 'IN';

    case NOT_IN = 'NOT_IN';

    case HAS_PROPERTY = 'HAS_PROPERTY';

    case NOT_HAS_PROPERTY = 'NOT_HAS_PROPERTY';

    case CONTAINS_TOKEN = 'CONTAINS_TOKEN';

    case NOT_CONTAINS_TOKEN = 'NOT_CONTAINS_TOKEN';
}
