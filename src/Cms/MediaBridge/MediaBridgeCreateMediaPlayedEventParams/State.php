<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedEventParams;

enum State: string
{
    case STARTED = 'STARTED';

    case VIEWED = 'VIEWED';
}
