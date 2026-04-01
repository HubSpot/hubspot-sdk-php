<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Properties\PropertyCreateParams;

/**
 * Indicates the sensitivity level of the property, with options: highly_sensitive, non_sensitive, or sensitive.
 */
enum DataSensitivity: string
{
    case HIGHLY_SENSITIVE = 'highly_sensitive';

    case NON_SENSITIVE = 'non_sensitive';

    case SENSITIVE = 'sensitive';
}
