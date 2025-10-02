<?php

declare(strict_types=1);

namespace HubspotSDK\Files\FileGetSignedURLParams;

enum Size: string
{
    case THUMB = 'thumb';

    case ICON = 'icon';

    case MEDIUM = 'medium';

    case PREVIEW = 'preview';
}
