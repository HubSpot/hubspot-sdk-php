<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Exports\ExportCreateAsyncParams;

enum ExportInternalValuesOption: string
{
    case NAMES = 'NAMES';

    case VALUES = 'VALUES';
}
