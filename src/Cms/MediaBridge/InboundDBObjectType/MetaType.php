<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge\InboundDBObjectType;

enum MetaType: string
{
    case CMS_HUBDB = 'CMS_HUBDB';

    case HUBSPOT = 'HUBSPOT';

    case HUBSPOT_EVENT = 'HUBSPOT_EVENT';

    case INTEGRATION = 'INTEGRATION';

    case INTEGRATION_EVENT = 'INTEGRATION_EVENT';

    case PORTAL_SPECIFIC = 'PORTAL_SPECIFIC';

    case PORTAL_SPECIFIC_EVENT = 'PORTAL_SPECIFIC_EVENT';

    case WORK = 'WORK';

    case WORK_SUB = 'WORK_SUB';
}
