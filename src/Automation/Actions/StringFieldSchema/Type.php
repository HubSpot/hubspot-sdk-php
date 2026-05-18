<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions\StringFieldSchema;

/**
 * Indicates that the type is a string, with the default value being STRING.
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
