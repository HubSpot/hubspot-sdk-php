<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Exports\PublicExportListRequest;

enum ExportInternalValuesOption: string
{
    case NAMES = 'NAMES';

    case VALUES = 'VALUES';
}
