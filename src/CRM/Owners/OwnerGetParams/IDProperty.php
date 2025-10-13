<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Owners\OwnerGetParams;

/**
 * Specifies whether to use 'id' or 'userId' as the identifier for the owner.
 */
enum IDProperty: string
{
    case ID = 'id';

    case USER_ID = 'userId';
}
