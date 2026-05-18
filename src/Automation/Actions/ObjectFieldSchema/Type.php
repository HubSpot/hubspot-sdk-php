<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions\ObjectFieldSchema;

/**
 * Specifies the type of the field, which is 'OBJECT' by default.
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
