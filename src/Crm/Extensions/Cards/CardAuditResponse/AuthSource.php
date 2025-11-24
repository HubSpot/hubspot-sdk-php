<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards\CardAuditResponse;

enum AuthSource: string
{
    case APP = 'APP';

    case EXTERNAL = 'EXTERNAL';

    case INTERNAL = 'INTERNAL';
}
