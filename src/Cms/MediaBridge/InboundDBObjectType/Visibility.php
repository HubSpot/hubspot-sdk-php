<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\InboundDBObjectType;

enum Visibility: string
{
    case CUSTOMER_FACING = 'Customer-facing';

    case CUSTOMER_FACING_PUBLIC_API = 'Customer-facing public API';

    case CUSTOMER_FACING_UI = 'Customer-facing UI';

    case INTERNAL_ONLY = 'Internal only';
}
