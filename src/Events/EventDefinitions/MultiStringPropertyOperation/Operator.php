<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions\MultiStringPropertyOperation;

enum Operator: string
{
    case IS_EQUAL_TO = 'IS_EQUAL_TO';

    case IS_NOT_EQUAL_TO = 'IS_NOT_EQUAL_TO';

    case CONTAINS = 'CONTAINS';

    case DOES_NOT_CONTAIN = 'DOES_NOT_CONTAIN';

    case STARTS_WITH = 'STARTS_WITH';

    case ENDS_WITH = 'ENDS_WITH';
}
