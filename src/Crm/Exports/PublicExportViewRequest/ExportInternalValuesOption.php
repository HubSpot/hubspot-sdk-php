<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Exports\PublicExportViewRequest;

enum ExportInternalValuesOption: string
{
    case NAMES = 'NAMES';

    case VALUES = 'VALUES';
}
