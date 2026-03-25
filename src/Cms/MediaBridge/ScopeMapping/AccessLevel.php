<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\ScopeMapping;

enum AccessLevel: string
{
    case ALL = 'ALL';

    case OWNED = 'OWNED';

    case TEAM_OWNED = 'TEAM_OWNED';

    case UNASSIGNED = 'UNASSIGNED';
}
