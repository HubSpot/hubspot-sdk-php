<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Exports\PublicExportViewRequest;

enum ExportInternalValuesOption: string
{
    case NAMES = 'NAMES';

    case VALUES = 'VALUES';
}
