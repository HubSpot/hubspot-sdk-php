<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Properties\Batch\BatchGetParams;

enum DataSensitivity: string
{
    case NON_SENSITIVE = 'non_sensitive';

    case SENSITIVE = 'sensitive';

    case HIGHLY_SENSITIVE = 'highly_sensitive';
}
