<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions\BooleanFieldSchema;

/**
 * Specifies the field type as BOOLEAN, indicating that the field can hold a true or false value.
 */
enum Type: string
{
    case ARRAY = 'ARRAY';

    case BOOLEAN = 'BOOLEAN';

    case DOUBLE = 'DOUBLE';

    case INTEGER = 'INTEGER';

    case LONG = 'LONG';

    case OBJECT = 'OBJECT';

    case STRING = 'STRING';
}
