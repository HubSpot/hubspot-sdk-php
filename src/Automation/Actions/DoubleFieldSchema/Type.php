<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions\DoubleFieldSchema;

/**
 * Indicates the field type as DOUBLE.
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
