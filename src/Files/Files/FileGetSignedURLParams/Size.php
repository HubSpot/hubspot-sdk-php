<?php

declare(strict_types=1);

namespace HubspotSDK\Files\Files\FileGetSignedURLParams;

enum Size: string
{
    case ICON = 'icon';

    case MEDIUM = 'medium';

    case PREVIEW = 'preview';

    case THUMB = 'thumb';
}
