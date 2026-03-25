<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels\FileAttachment;

enum FileUsageType: string
{
    case AUDIO = 'AUDIO';

    case IMAGE = 'IMAGE';

    case OTHER = 'OTHER';

    case STICKER = 'STICKER';

    case VOICE_RECORDING = 'VOICE_RECORDING';
}
