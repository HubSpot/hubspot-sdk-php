<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Extensions\Cards\CardAuditResponse;

enum ActionType: string
{
    case CREATE = 'CREATE';

    case UPDATE = 'UPDATE';

    case DELETE = 'DELETE';
}
