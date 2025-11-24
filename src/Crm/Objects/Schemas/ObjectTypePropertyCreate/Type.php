<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Schemas\ObjectTypePropertyCreate;

/**
 * The data type of the property.
 */
enum Type: string
{
    case BOOL = 'bool';

    case DATE = 'date';

    case DATETIME = 'datetime';

    case ENUMERATION = 'enumeration';

    case NUMBER = 'number';

    case STRING = 'string';
}
