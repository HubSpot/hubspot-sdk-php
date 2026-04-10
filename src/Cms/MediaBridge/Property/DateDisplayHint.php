<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge\Property;

enum DateDisplayHint: string
{
    case ABSOLUTE = 'absolute';

    case ABSOLUTE_WITH_RELATIVE = 'absolute_with_relative';

    case TIME_SINCE = 'time_since';

    case TIME_UNTIL = 'time_until';
}
