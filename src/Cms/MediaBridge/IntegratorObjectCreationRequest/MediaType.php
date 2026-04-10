<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge\IntegratorObjectCreationRequest;

enum MediaType: string
{
    case VIDEO = 'VIDEO';

    case AUDIO = 'AUDIO';

    case DOCUMENT = 'DOCUMENT';

    case OTHER = 'OTHER';

    case IMAGE = 'IMAGE';
}
