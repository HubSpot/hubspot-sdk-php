<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Definitions\EnumerationPropertyOperation;

enum Operator: string
{
    case CONTAINS_ALL = 'CONTAINS_ALL';

    case DOES_NOT_CONTAIN_ALL = 'DOES_NOT_CONTAIN_ALL';

    case HAS_EVER_BEEN_ANY_OF = 'HAS_EVER_BEEN_ANY_OF';

    case HAS_EVER_BEEN_EXACTLY = 'HAS_EVER_BEEN_EXACTLY';

    case HAS_EVER_CONTAINED_ALL = 'HAS_EVER_CONTAINED_ALL';

    case HAS_NEVER_BEEN_ANY_OF = 'HAS_NEVER_BEEN_ANY_OF';

    case HAS_NEVER_BEEN_EXACTLY = 'HAS_NEVER_BEEN_EXACTLY';

    case HAS_NEVER_CONTAINED_ALL = 'HAS_NEVER_CONTAINED_ALL';

    case IS_ANY_OF = 'IS_ANY_OF';

    case IS_EXACTLY = 'IS_EXACTLY';

    case IS_NONE_OF = 'IS_NONE_OF';

    case IS_NOT_EXACTLY = 'IS_NOT_EXACTLY';
}
