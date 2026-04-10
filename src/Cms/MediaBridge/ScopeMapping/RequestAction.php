<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge\ScopeMapping;

enum RequestAction: string
{
    case COMMUNICATE = 'COMMUNICATE';

    case DELETE = 'DELETE';

    case EDIT = 'EDIT';

    case EDIT_ASSOCIATION = 'EDIT_ASSOCIATION';

    case MERGE = 'MERGE';

    case VIEW = 'VIEW';
}
