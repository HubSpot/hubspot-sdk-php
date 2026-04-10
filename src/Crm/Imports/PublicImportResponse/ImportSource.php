<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Imports\PublicImportResponse;

/**
 * Indicates where/how the import was initiated.
 */
enum ImportSource: string
{
    case API = 'API';

    case CRM_UI = 'CRM_UI';

    case IMPORT = 'IMPORT';

    case MOBILE_ANDROID = 'MOBILE_ANDROID';

    case MOBILE_IOS = 'MOBILE_IOS';

    case SALESFORCE = 'SALESFORCE';
}
