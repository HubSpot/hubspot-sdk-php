<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms\MarketingFormsDependentFieldFilter;

enum Operator: string
{
    case EQ = 'eq';

    case NEQ = 'neq';

    case CONTAINS = 'contains';

    case DOESNT_CONTAIN = 'doesnt_contain';

    case STR_STARTS_WITH = 'str_starts_with';

    case STR_ENDS_WITH = 'str_ends_with';

    case LT = 'lt';

    case LTE = 'lte';

    case GT = 'gt';

    case GTE = 'gte';

    case BETWEEN = 'between';

    case NOT_BETWEEN = 'not_between';

    case WITHIN_TIME_REVERSE = 'within_time_reverse';

    case WITHIN_TIME = 'within_time';

    case SET_ANY = 'set_any';

    case SET_NOT_ANY = 'set_not_any';

    case SET_ALL = 'set_all';

    case SET_NOT_ALL = 'set_not_all';

    case SET_EQ = 'set_eq';

    case SET_NEQ = 'set_neq';

    case IS_NOT_EMPTY = 'is_not_empty';
}
