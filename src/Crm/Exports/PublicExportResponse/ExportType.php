<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Exports\PublicExportResponse;

/**
 * The type of export, which can be either VIEW or LIST.
 */
enum ExportType: string
{
    case VIEW = 'VIEW';

    case LIST = 'LIST';
}
