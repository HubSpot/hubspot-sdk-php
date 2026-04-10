<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge\MediaPlayedEventRequest;

enum State: string
{
    case STARTED = 'STARTED';

    case VIEWED = 'VIEWED';
}
