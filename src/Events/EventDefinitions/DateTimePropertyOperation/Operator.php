<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions\DateTimePropertyOperation;

enum Operator: string
{
    case IS_BEFORE = 'IS_BEFORE';

    case IS_AFTER = 'IS_AFTER';

    case IS_EQUAL_TO = 'IS_EQUAL_TO';

    case IS_BEFORE_DATE = 'IS_BEFORE_DATE';

    case IS_AFTER_DATE = 'IS_AFTER_DATE';
}
