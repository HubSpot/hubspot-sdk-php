<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\InboundDBObjectType;

enum Status: string
{
    case DEPRECATED = 'Deprecated';

    case IN_DEVELOPMENT = 'In development';

    case LIVE = 'Live';
}
