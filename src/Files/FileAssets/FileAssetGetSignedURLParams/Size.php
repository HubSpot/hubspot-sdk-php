<?php

declare(strict_types=1);

namespace HubspotSDK\Files\FileAssets\FileAssetGetSignedURLParams;

enum Size: string
{
    case ICON = 'icon';

    case MEDIUM = 'medium';

    case PREVIEW = 'preview';

    case THUMB = 'thumb';
}
