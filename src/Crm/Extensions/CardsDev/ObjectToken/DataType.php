<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\CardsDev\ObjectToken;

/**
 * The type of the property. Can be one of CURRENCY, DATE, DATETIME, EMAIL, LINK, NUMERIC, STATUS.
 */
enum DataType: string
{
    case BOOLEAN = 'BOOLEAN';

    case CURRENCY = 'CURRENCY';

    case DATE = 'DATE';

    case DATETIME = 'DATETIME';

    case EMAIL = 'EMAIL';

    case LINK = 'LINK';

    case NUMERIC = 'NUMERIC';

    case STATUS = 'STATUS';

    case STRING = 'STRING';
}
