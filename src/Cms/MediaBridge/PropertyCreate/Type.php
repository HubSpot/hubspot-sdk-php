<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge\PropertyCreate;

enum Type: string
{
    case BOOL = 'bool';

    case DATE = 'date';

    case DATETIME = 'datetime';

    case ENUMERATION = 'enumeration';

    case NUMBER = 'number';

    case PHONE_NUMBER = 'phone_number';

    case STRING = 'string';
}
