<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge\RollupExpression;

enum RollupOperator: string
{
    case AVERAGE = 'AVERAGE';

    case COUNT = 'COUNT';

    case EARLIEST_VALUE = 'EARLIEST_VALUE';

    case LATEST_VALUE = 'LATEST_VALUE';

    case MAX = 'MAX';

    case MAX_BY = 'MAX_BY';

    case MIN = 'MIN';

    case MIN_BY = 'MIN_BY';

    case REFERENCED_ID_SET = 'REFERENCED_ID_SET';

    case REFERENCED_STRING_SET = 'REFERENCED_STRING_SET';

    case REFERENCED_STRING_SET_INTERSECTION = 'REFERENCED_STRING_SET_INTERSECTION';

    case SUM = 'SUM';

    case SYNC_MAX_BY = 'SYNC_MAX_BY';

    case SYNC_MIN_BY = 'SYNC_MIN_BY';

    case SYNC_VALUE = 'SYNC_VALUE';

    case UNKNOWN_ROLLUP_OPERATOR = 'UNKNOWN_ROLLUP_OPERATOR';
}
