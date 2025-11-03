<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards\DisplayOption;

/**
 * The type of status.
 */
enum Type: string
{
    case DEFAULT = 'DEFAULT';

    case SUCCESS = 'SUCCESS';

    case WARNING = 'WARNING';

    case DANGER = 'DANGER';

    case INFO = 'INFO';
}
