<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Imports\PublicImportResponse;

enum ImportSource: string
{
    case API = 'API';

    case CRM_UI = 'CRM_UI';

    case IMPORT = 'IMPORT';

    case MOBILE_ANDROID = 'MOBILE_ANDROID';

    case MOBILE_IOS = 'MOBILE_IOS';

    case SALESFORCE = 'SALESFORCE';
}
