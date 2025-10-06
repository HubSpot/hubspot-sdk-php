<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\PublicStatus;

enum Status: string
{
    case SUBSCRIBED = 'SUBSCRIBED';

    case UNSUBSCRIBED = 'UNSUBSCRIBED';

    case NOT_SPECIFIED = 'NOT_SPECIFIED';
}
