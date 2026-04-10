<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Properties\PropertyGetParams;

enum DataSensitivity: string
{
    case HIGHLY_SENSITIVE = 'highly_sensitive';

    case NON_SENSITIVE = 'non_sensitive';

    case SENSITIVE = 'sensitive';
}
