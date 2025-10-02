<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Properties\CRMPropertiesPropertyCreate;

enum DataSensitivity: string
{
    case NON_SENSITIVE = 'non_sensitive';

    case SENSITIVE = 'sensitive';

    case HIGHLY_SENSITIVE = 'highly_sensitive';
}
