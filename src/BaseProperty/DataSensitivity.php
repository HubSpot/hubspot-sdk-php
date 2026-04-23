<?php

declare(strict_types=1);

namespace HubSpotSDK\BaseProperty;

/**
 * Indicates the sensitivity level of the property, such as "non_sensitive", "sensitive", or "highly_sensitive".
 */
enum DataSensitivity: string
{
    case HIGHLY_SENSITIVE = 'highly_sensitive';

    case NON_SENSITIVE = 'non_sensitive';

    case SENSITIVE = 'sensitive';
}
