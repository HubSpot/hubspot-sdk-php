<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge\MediaPlayedEventRequest;

enum ExternalPlayContext: string
{
    case EMAIL = 'EMAIL';

    case EXTERNAL_PAGE = 'EXTERNAL_PAGE';
}
