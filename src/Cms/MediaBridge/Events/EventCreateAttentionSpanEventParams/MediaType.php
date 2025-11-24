<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Events\EventCreateAttentionSpanEventParams;

enum MediaType: string
{
    case AUDIO = 'AUDIO';

    case DOCUMENT = 'DOCUMENT';

    case IMAGE = 'IMAGE';

    case OTHER = 'OTHER';

    case VIDEO = 'VIDEO';
}
