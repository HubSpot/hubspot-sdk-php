<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\AuditLogs\AuditLogExportParams;

enum Format: string
{
    case CSV = 'CSV';

    case XLS = 'XLS';

    case XLSX = 'XLSX';
}
