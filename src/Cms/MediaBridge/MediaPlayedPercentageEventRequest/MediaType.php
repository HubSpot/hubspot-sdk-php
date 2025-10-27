<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\MediaPlayedPercentageEventRequest;

enum MediaType: string
{
    case VIDEO = 'VIDEO';

    case AUDIO = 'AUDIO';

    case DOCUMENT = 'DOCUMENT';

    case OTHER = 'OTHER';

    case IMAGE = 'IMAGE';
}
