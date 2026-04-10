<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Properties\Batch\BatchGetParams;

enum DataSensitivity: string
{
    case HIGHLY_SENSITIVE = 'highly_sensitive';

    case NON_SENSITIVE = 'non_sensitive';

    case SENSITIVE = 'sensitive';
}
