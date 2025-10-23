<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions\StringPropertyOperation;

enum Operator: string
{
    case IS_EQUAL_TO = 'IS_EQUAL_TO';

    case IS_NOT_EQUAL_TO = 'IS_NOT_EQUAL_TO';

    case CONTAINS = 'CONTAINS';

    case DOES_NOT_CONTAIN = 'DOES_NOT_CONTAIN';

    case STARTS_WITH = 'STARTS_WITH';

    case ENDS_WITH = 'ENDS_WITH';

    case HAS_EVER_BEEN_EQUAL_TO = 'HAS_EVER_BEEN_EQUAL_TO';

    case HAS_NEVER_BEEN_EQUAL_TO = 'HAS_NEVER_BEEN_EQUAL_TO';

    case HAS_EVER_CONTAINED = 'HAS_EVER_CONTAINED';

    case HAS_NEVER_CONTAINED = 'HAS_NEVER_CONTAINED';
}
