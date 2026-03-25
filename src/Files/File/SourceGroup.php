<?php

declare(strict_types=1);

namespace HubspotSDK\Files\File;

enum SourceGroup: string
{
    case CONTENT = 'CONTENT';

    case CONVERSATIONS = 'CONVERSATIONS';

    case FORMS = 'FORMS';

    case UI_EXTENSIONS = 'UI_EXTENSIONS';

    case UNKNOWN = 'UNKNOWN';
}
