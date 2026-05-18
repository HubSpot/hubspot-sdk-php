<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions\IntegerFieldSchema;

/**
 * The type of the field, which is set to INTEGER.
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
