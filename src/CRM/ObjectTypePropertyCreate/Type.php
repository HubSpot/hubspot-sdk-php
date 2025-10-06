<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\ObjectTypePropertyCreate;

enum Type: string
{
    case STRING = 'string';

    case NUMBER = 'number';

    case DATE = 'date';

    case DATETIME = 'datetime';

    case ENUMERATION = 'enumeration';

    case BOOL = 'bool';
}
