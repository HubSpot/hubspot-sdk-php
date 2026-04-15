<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks\SnapshotStatusResponse;

/**
 * The code representing any error that occurred during the snapshot operation. Possible values are 'TIMEOUT', 'VALIDATION_ERROR', 'INTERNAL_ERROR', and 'PERMISSION_DENIED'.
 */
enum ErrorCode: string
{
    case INTERNAL_ERROR = 'INTERNAL_ERROR';

    case PERMISSION_DENIED = 'PERMISSION_DENIED';

    case TIMEOUT = 'TIMEOUT';

    case VALIDATION_ERROR = 'VALIDATION_ERROR';
}
