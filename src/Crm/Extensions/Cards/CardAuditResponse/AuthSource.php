<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards\CardAuditResponse;

enum AuthSource: string
{
    case INTERNAL = 'INTERNAL';

    case APP = 'APP';

    case EXTERNAL = 'EXTERNAL';
}
