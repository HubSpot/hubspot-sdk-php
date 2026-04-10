<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge\InboundDBObjectType;

enum PermissioningType: string
{
    case ALL_OR_NONE = 'ALL_OR_NONE';

    case DO_NOT_CHECK_PERMISSIONS = 'DO_NOT_CHECK_PERMISSIONS';

    case EXPLICIT = 'EXPLICIT';

    case OWNER_BASED = 'OWNER_BASED';

    case TEAM_BASED = 'TEAM_BASED';
}
