<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Property;

/**
 * The mode in which the property is displayed. Can be: "current_value" or "all_unique_versions".
 */
enum DisplayMode: string
{
    case CURRENT_VALUE = 'current_value';

    case ALL_UNIQUE_VERSIONS = 'all_unique_versions';
}
