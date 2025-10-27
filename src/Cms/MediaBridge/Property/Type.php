<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Property;

/**
 * The data type of the property, such as string or number.
 */
enum Type: string
{
    case STRING = 'string';

    case NUMBER = 'number';

    case BOOL = 'bool';

    case DATETIME = 'datetime';

    case ENUMERATION = 'enumeration';

    case DATE = 'date';

    case PHONE_NUMBER = 'phone_number';

    case CURRENCY_NUMBER = 'currency_number';

    case JSON = 'json';

    case OBJECT_COORDINATES = 'object_coordinates';
}
