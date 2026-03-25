<?php

declare(strict_types=1);

namespace HubspotSDK\Files\File;

/**
 * File access. Can be PUBLIC_INDEXABLE, PUBLIC_NOT_INDEXABLE, PRIVATE.
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
