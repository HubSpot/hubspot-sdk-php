<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Exports\PublicExportViewRequest;

enum Format: string
{
    case XLS = 'XLS';

    case XLSX = 'XLSX';

    case CSV = 'CSV';
}
