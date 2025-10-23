<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Timeline\TimelineEventTemplateToken;

/**
 * The data type of the token. You can currently choose from [string, number, date, enumeration].
 */
enum Type: string
{
    case DATE = 'date';

    case ENUMERATION = 'enumeration';

    case NUMBER = 'number';

    case STRING = 'string';
}
