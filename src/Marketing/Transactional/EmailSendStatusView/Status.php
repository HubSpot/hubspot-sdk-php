<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Transactional\EmailSendStatusView;

/**
 * Status of the send request.
 */
enum Status: string
{
    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';

    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';
}
