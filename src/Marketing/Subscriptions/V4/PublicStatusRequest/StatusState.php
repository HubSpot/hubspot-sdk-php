<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4\PublicStatusRequest;

/**
 * The status of the contact's subscription.
 */
enum StatusState: string
{
    case NOT_SPECIFIED = 'NOT_SPECIFIED';

    case SUBSCRIBED = 'SUBSCRIBED';

    case UNSUBSCRIBED = 'UNSUBSCRIBED';
}
