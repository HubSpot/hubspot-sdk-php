<?php

declare(strict_types=1);

namespace HubSpotSDK\Files\FileAssets\FileAssetGetSignedURLParams;

enum Size: string
{
    case ICON = 'icon';

    case MEDIUM = 'medium';

    case PREVIEW = 'preview';

    case THUMB = 'thumb';
}
