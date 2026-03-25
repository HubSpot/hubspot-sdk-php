<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\CardsDev\CardAuditResponse;

/**
 * The source of authentication for the action, with possible values: APP, EXTERNAL, INTERNAL.
 */
enum AuthSource: string
{
    case APP = 'APP';

    case EXTERNAL = 'EXTERNAL';

    case INTERNAL = 'INTERNAL';
}
