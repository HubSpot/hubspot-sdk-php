<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\MediaPlayedEventRequest;

enum MediaType: string
{
    case VIDEO = 'VIDEO';

    case AUDIO = 'AUDIO';

    case DOCUMENT = 'DOCUMENT';

    case OTHER = 'OTHER';

    case IMAGE = 'IMAGE';
}
