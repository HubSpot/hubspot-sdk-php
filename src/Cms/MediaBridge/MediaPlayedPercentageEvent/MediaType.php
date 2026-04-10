<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge\MediaPlayedPercentageEvent;

enum MediaType: string
{
    case AUDIO = 'AUDIO';

    case DOCUMENT = 'DOCUMENT';

    case IMAGE = 'IMAGE';

    case OTHER = 'OTHER';

    case VIDEO = 'VIDEO';
}
