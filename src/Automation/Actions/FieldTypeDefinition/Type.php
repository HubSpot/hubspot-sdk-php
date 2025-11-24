<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\FieldTypeDefinition;

enum Type: string
{
    case BOOL = 'bool';

    case CURRENCY_NUMBER = 'currency_number';

    case DATE = 'date';

    case DATETIME = 'datetime';

    case ENUMERATION = 'enumeration';

    case JSON = 'json';

    case NUMBER = 'number';

    case OBJECT_COORDINATES = 'object_coordinates';

    case PHONE_NUMBER = 'phone_number';

    case STRING = 'string';
}
