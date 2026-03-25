<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels\SocialMetadata;

enum MediaType: string
{
    case ARTICLE = 'ARTICLE';

    case AUDIO = 'AUDIO';

    case CAROUSEL = 'CAROUSEL';

    case DOCUMENT = 'DOCUMENT';

    case GIF = 'GIF';

    case LINK = 'LINK';

    case NONE = 'NONE';

    case PHOTO = 'PHOTO';

    case POLL = 'POLL';

    case STORY = 'STORY';

    case VIDEO = 'VIDEO';
}
