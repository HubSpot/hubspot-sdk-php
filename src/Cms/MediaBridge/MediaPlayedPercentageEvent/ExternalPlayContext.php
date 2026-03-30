<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\MediaPlayedPercentageEvent;

enum ExternalPlayContext: string
{
    case EMAIL = 'EMAIL';

    case EXTERNAL_PAGE = 'EXTERNAL_PAGE';
}
