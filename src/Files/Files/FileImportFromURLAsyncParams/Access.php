<?php

declare(strict_types=1);

namespace HubspotSDK\Files\Files\FileImportFromURLAsyncParams;

/**
 * PUBLIC_INDEXABLE: File is publicly accessible by anyone who has the URL. Search engines can index the file. PUBLIC_NOT_INDEXABLE: File is publicly accessible by anyone who has the URL. Search engines *can't* index the file. PRIVATE: File is NOT publicly accessible. Requires a signed URL to see content. Search engines *can't* index the file.
 */
enum Access: string
{
    case PUBLIC_INDEXABLE = 'PUBLIC_INDEXABLE';

    case PUBLIC_NOT_INDEXABLE = 'PUBLIC_NOT_INDEXABLE';

    case HIDDEN_INDEXABLE = 'HIDDEN_INDEXABLE';

    case HIDDEN_NOT_INDEXABLE = 'HIDDEN_NOT_INDEXABLE';

    case HIDDEN_PRIVATE = 'HIDDEN_PRIVATE';

    case PRIVATE = 'PRIVATE';

    case HIDDEN_SENSITIVE = 'HIDDEN_SENSITIVE';

    case SENSITIVE = 'SENSITIVE';
}
