<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\InboundDBObjectType;

enum MetaType: string
{
    case HUBSPOT = 'HUBSPOT';

    case INTEGRATION = 'INTEGRATION';

    case PORTAL_SPECIFIC = 'PORTAL_SPECIFIC';

    case CMS_HUBDB = 'CMS_HUBDB';

    case HUBSPOT_EVENT = 'HUBSPOT_EVENT';

    case INTEGRATION_EVENT = 'INTEGRATION_EVENT';

    case PORTAL_SPECIFIC_EVENT = 'PORTAL_SPECIFIC_EVENT';
}
