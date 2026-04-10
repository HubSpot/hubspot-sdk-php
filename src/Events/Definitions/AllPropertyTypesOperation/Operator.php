<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions\AllPropertyTypesOperation;

enum Operator: string
{
    case IS_BLANK = 'IS_BLANK';

    case IS_KNOWN = 'IS_KNOWN';

    case IS_NOT_BLANK = 'IS_NOT_BLANK';

    case IS_UNKNOWN = 'IS_UNKNOWN';
}
