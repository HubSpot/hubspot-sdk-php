<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge\MediaBridgeCreatePropertyParams;

enum DataSensitivity: string
{
    case HIGHLY_SENSITIVE = 'highly_sensitive';

    case NON_SENSITIVE = 'non_sensitive';

    case SENSITIVE = 'sensitive';
}
