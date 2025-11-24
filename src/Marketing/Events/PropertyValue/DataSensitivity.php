<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events\PropertyValue;

/**
 * The sensitivity level of the property, such as "non_sensitive", "sensitive", and "highly_sensitive".
 */
enum DataSensitivity: string
{
    case HIGH = 'high';

    case NONE = 'none';

    case STANDARD = 'standard';
}
