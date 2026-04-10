<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks\BatchResponseJournalFetchResponse;

enum Status: string
{
    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';

    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';
}
