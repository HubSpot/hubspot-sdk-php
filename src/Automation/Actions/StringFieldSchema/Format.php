<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\StringFieldSchema;

/**
 * Specifies the format of the string, with accepted values: DATE, DATE_TIME, OBJECT_COORDINATE, TIME, URI.
 */
enum Format: string
{
    case DATE = 'DATE';

    case DATE_TIME = 'DATE_TIME';

    case OBJECT_COORDINATE = 'OBJECT_COORDINATE';

    case TIME = 'TIME';

    case URI = 'URI';
}
