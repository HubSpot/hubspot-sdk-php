<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4\PublicStatus;

enum Status: string
{
    case SUBSCRIBED = 'SUBSCRIBED';

    case UNSUBSCRIBED = 'UNSUBSCRIBED';

    case NOT_SPECIFIED = 'NOT_SPECIFIED';
}
