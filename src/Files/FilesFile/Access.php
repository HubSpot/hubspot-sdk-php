<?php

declare(strict_types=1);

namespace HubspotSDK\Files\FilesFile;

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
