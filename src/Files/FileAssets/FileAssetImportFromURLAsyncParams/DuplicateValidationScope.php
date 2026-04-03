<?php

declare(strict_types=1);

namespace HubspotSDK\Files\FileAssets\FileAssetImportFromURLAsyncParams;

/**
 * ENTIRE_PORTAL: Look for a duplicate file in the entire account. EXACT_FOLDER: Look for a duplicate file in the provided folder.
 */
enum DuplicateValidationScope: string
{
    case ENTIRE_PORTAL = 'ENTIRE_PORTAL';

    case EXACT_FOLDER = 'EXACT_FOLDER';
}
