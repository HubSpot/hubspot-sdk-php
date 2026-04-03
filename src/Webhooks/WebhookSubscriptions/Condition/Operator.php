<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks\WebhookSubscriptions\Condition;

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
