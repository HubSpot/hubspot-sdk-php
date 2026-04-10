<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Hubdb\Column;

/**
 * Type of the column.
 */
enum Type: string
{
    case BOOLEAN = 'BOOLEAN';

    case CODE = 'CODE';

    case COMPOSITE = 'COMPOSITE';

    case CTA = 'CTA';

    case CURRENCY = 'CURRENCY';

    case DATE = 'DATE';

    case DATETIME = 'DATETIME';

    case EMBED = 'EMBED';

    case FILE = 'FILE';

    case FOREIGN_ID = 'FOREIGN_ID';

    case HUBSPOT_VIDEO = 'HUBSPOT_VIDEO';

    case IMAGE = 'IMAGE';

    case JSON = 'JSON';

    case LOCATION = 'LOCATION';

    case MULTISELECT = 'MULTISELECT';

    case NULL = 'NULL';

    case NUMBER = 'NUMBER';

    case RICHTEXT = 'RICHTEXT';

    case SELECT = 'SELECT';

    case TEXT = 'TEXT';

    case URL = 'URL';

    case VIDEO = 'VIDEO';
}
