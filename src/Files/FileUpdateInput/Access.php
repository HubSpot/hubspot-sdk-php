<?php

declare(strict_types=1);

namespace HubspotSDK\Files\FileUpdateInput;

/**
 * NONE: Do not run any duplicate validation. REJECT: Reject the upload if a duplicate is found. RETURN_EXISTING: If a duplicate file is found, do not upload a new file and return the found duplicate instead.
 */
enum Access: string
{
    case HIDDEN_INDEXABLE = 'HIDDEN_INDEXABLE';

    case HIDDEN_NOT_INDEXABLE = 'HIDDEN_NOT_INDEXABLE';

    case HIDDEN_PRIVATE = 'HIDDEN_PRIVATE';

    case HIDDEN_SENSITIVE = 'HIDDEN_SENSITIVE';

    case PRIVATE = 'PRIVATE';

    case PUBLIC_INDEXABLE = 'PUBLIC_INDEXABLE';

    case PUBLIC_NOT_INDEXABLE = 'PUBLIC_NOT_INDEXABLE';

    case SENSITIVE = 'SENSITIVE';
}
