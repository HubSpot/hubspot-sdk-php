<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge\MediaPlayedPercentageEventRequest;

enum ExternalPlayContext: string
{
    case EMAIL = 'EMAIL';

    case EXTERNAL_PAGE = 'EXTERNAL_PAGE';
}
