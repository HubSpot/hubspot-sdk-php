<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms\DependentFieldFilter;

enum Operator: string
{
    case BETWEEN = 'between';

    case CONTAINS = 'contains';

    case DOESNT_CONTAIN = 'doesnt_contain';

    case EQ = 'eq';

    case GT = 'gt';

    case GTE = 'gte';

    case IS_NOT_EMPTY = 'is_not_empty';

    case LT = 'lt';

    case LTE = 'lte';

    case NEQ = 'neq';

    case NOT_BETWEEN = 'not_between';

    case SET_ALL = 'set_all';

    case SET_ANY = 'set_any';

    case SET_EQ = 'set_eq';

    case SET_NEQ = 'set_neq';

    case SET_NOT_ALL = 'set_not_all';

    case SET_NOT_ANY = 'set_not_any';

    case STR_ENDS_WITH = 'str_ends_with';

    case STR_STARTS_WITH = 'str_starts_with';

    case WITHIN_TIME = 'within_time';

    case WITHIN_TIME_REVERSE = 'within_time_reverse';
}
