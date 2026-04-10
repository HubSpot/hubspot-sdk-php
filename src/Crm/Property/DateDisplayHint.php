<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Property;

/**
 * Controls how date properties are displayed in the HubSpot UI, with options such as 'absolute', 'absolute_with_relative', 'time_since', and 'time_until'.
 */
enum DateDisplayHint: string
{
    case ABSOLUTE = 'absolute';

    case ABSOLUTE_WITH_RELATIVE = 'absolute_with_relative';

    case TIME_SINCE = 'time_since';

    case TIME_UNTIL = 'time_until';
}
