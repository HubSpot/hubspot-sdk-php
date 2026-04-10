<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Exports\PublicExportViewRequest;

enum Format: string
{
    case XLS = 'XLS';

    case XLSX = 'XLSX';

    case CSV = 'CSV';
}
