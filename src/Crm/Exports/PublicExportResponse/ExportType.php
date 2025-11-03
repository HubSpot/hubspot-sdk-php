<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Exports\PublicExportResponse;

enum ExportType: string
{
    case VIEW = 'VIEW';

    case LIST = 'LIST';
}
