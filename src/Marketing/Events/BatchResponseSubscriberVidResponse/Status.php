<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events\BatchResponseSubscriberVidResponse;

enum Status: string
{
    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';

    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';
}
