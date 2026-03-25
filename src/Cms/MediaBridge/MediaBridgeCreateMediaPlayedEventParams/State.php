<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedEventParams;

enum State: string
{
    case STARTED = 'STARTED';

    case VIEWED = 'VIEWED';
}
