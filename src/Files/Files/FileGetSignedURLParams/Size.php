<?php

declare(strict_types=1);

namespace HubspotSDK\Files\Files\FileGetSignedURLParams;

/**
 * For image files. This will resize the image to the desired size before sharing. Does not affect the original file, just the file served by this signed URL.
 */
enum Size: string
{
    case ICON = 'icon';

    case MEDIUM = 'medium';

    case PREVIEW = 'preview';

    case THUMB = 'thumb';
}
