<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge\InboundDBObjectType;

enum Visibility1: string
{
    case CUSTOMER_FACING = 'Customer-facing';

    case INTERNAL_ONLY = 'Internal only';

    case CUSTOMER_FACING_UI = 'Customer-facing UI';

    case CUSTOMER_FACING_PUBLIC_API = 'Customer-facing public API';
}
