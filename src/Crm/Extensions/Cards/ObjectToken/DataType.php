<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards\ObjectToken;

enum DataType: string
{
    case BOOLEAN = 'BOOLEAN';

    case CURRENCY = 'CURRENCY';

    case DATE = 'DATE';

    case DATETIME = 'DATETIME';

    case EMAIL = 'EMAIL';

    case LINK = 'LINK';

    case NUMERIC = 'NUMERIC';

    case STRING = 'STRING';

    case STATUS = 'STATUS';
}
