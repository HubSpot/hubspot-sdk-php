<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Exports\PublicExportListRequest;

enum Format: string
{
    case CSV = 'CSV';

    case XLS = 'XLS';

    case XLSX = 'XLSX';
}
