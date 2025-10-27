<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Property;

/**
 * Indicates the sensitivity level of the property, such as "non_sensitive", "sensitive", or "highly_sensitive".
 */
enum DataSensitivity: string
{
    case NONE = 'none';

    case STANDARD = 'standard';

    case HIGH = 'high';
}
