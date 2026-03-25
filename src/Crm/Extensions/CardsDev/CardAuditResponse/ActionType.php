<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\CardsDev\CardAuditResponse;

/**
 * The type of action performed, with possible values: CREATE, DELETE, UPDATE.
 */
enum ActionType: string
{
    case CREATE = 'CREATE';

    case DELETE = 'DELETE';

    case UPDATE = 'UPDATE';
}
