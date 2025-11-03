<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Schemas\ObjectTypePropertyCreate;

/**
 * The data type of the property.
 */
enum Type: string
{
    case STRING = 'string';

    case NUMBER = 'number';

    case DATE = 'date';

    case DATETIME = 'datetime';

    case ENUMERATION = 'enumeration';

    case BOOL = 'bool';
}
