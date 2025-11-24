<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards\DisplayOption;

/**
 * The type of status.
 */
enum Type: string
{
    case DANGER = 'DANGER';

    case DEFAULT = 'DEFAULT';

    case INFO = 'INFO';

    case SUCCESS = 'SUCCESS';

    case WARNING = 'WARNING';
}
