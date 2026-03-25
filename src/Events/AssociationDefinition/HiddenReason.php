<?php

declare(strict_types=1);

namespace HubspotSDK\Events\AssociationDefinition;

enum HiddenReason: string
{
    case DEFAULT = 'DEFAULT';

    case INTERNAL = 'INTERNAL';

    case USER_CONFIGURED = 'USER_CONFIGURED';
}
