<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions\ArrayFieldSchema;

/**
 * Specifies that the field is of type 'ARRAY'.
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
