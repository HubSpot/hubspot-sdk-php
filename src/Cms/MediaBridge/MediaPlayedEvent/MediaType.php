<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge\MediaPlayedEvent;

enum MediaType: string
{
    case AUDIO = 'AUDIO';

    case DOCUMENT = 'DOCUMENT';

    case IMAGE = 'IMAGE';

    case OTHER = 'OTHER';

    case VIDEO = 'VIDEO';
}
