<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Exports\PublicExportViewRequest;

enum Format: string
{
    case CSV = 'CSV';

    case XLS = 'XLS';

    case XLSX = 'XLSX';
}
