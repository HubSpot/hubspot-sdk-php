<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Extensions\CardsDev\CardDisplayProperty;

/**
 * Type of data represented by this property.
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
