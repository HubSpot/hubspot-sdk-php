<?php

declare(strict_types=1);

namespace HubspotSDK\Files\FileOperations\FileOperationImportFromURLAsyncParams;

/**
 * NONE: Do not run any duplicate validation. REJECT: Reject the upload if a duplicate is found. RETURN_EXISTING: If a duplicate file is found, do not upload a new file and return the found duplicate instead.
 */
enum DuplicateValidationStrategy: string
{
    case NONE = 'NONE';

    case REJECT = 'REJECT';

    case RETURN_EXISTING = 'RETURN_EXISTING';
}
