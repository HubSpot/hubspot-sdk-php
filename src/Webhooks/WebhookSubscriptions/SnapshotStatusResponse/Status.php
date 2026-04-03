<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks\WebhookSubscriptions\SnapshotStatusResponse;

enum Status: string
{
    case COMPLETED = 'COMPLETED';

    case EXPIRED = 'EXPIRED';

    case FAILED = 'FAILED';

    case IN_PROGRESS = 'IN_PROGRESS';

    case PENDING = 'PENDING';
}
