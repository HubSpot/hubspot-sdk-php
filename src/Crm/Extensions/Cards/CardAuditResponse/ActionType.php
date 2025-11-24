<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards\CardAuditResponse;

enum ActionType: string
{
    case CREATE = 'CREATE';

    case DELETE = 'DELETE';

    case UPDATE = 'UPDATE';
}
