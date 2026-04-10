<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge\PropertyDefinitionSource;

enum Type: string
{
    case GLOBAL = 'GLOBAL';

    case HAVEN_BRANCH = 'HAVEN_BRANCH';

    case OBJECT_TYPE = 'OBJECT_TYPE';

    case PORTAL = 'PORTAL';
}
