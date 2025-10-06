<?php

declare(strict_types=1);

namespace HubspotSDK\Files\ImportFromURLInput;

enum DuplicateValidationStrategy: string
{
    case NONE = 'NONE';

    case REJECT = 'REJECT';

    case RETURN_EXISTING = 'RETURN_EXISTING';
}
