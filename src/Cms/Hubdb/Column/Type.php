<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Column;

/**
 * Type of the column.
 */
enum Type: string
{
    case NULL = 'NULL';

    case TEXT = 'TEXT';

    case NUMBER = 'NUMBER';

    case URL = 'URL';

    case IMAGE = 'IMAGE';

    case SELECT = 'SELECT';

    case MULTISELECT = 'MULTISELECT';

    case BOOLEAN = 'BOOLEAN';

    case LOCATION = 'LOCATION';

    case DATE = 'DATE';

    case DATETIME = 'DATETIME';

    case CURRENCY = 'CURRENCY';

    case RICHTEXT = 'RICHTEXT';

    case FOREIGN_ID = 'FOREIGN_ID';

    case VIDEO = 'VIDEO';

    case CTA = 'CTA';

    case FILE = 'FILE';

    case JSON = 'JSON';

    case COMPOSITE = 'COMPOSITE';

    case CODE = 'CODE';

    case HUBSPOT_VIDEO = 'HUBSPOT_VIDEO';

    case EMBED = 'EMBED';
}
