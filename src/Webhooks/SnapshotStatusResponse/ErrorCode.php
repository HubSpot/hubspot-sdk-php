<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks\SnapshotStatusResponse;

enum ErrorCode: string
{
    case INTERNAL_ERROR = 'INTERNAL_ERROR';

    case PERMISSION_DENIED = 'PERMISSION_DENIED';

    case TIMEOUT = 'TIMEOUT';

    case VALIDATION_ERROR = 'VALIDATION_ERROR';
}
