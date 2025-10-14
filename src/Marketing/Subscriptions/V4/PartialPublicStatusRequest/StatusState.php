<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4\PartialPublicStatusRequest;

/**
 * The current subscription status of the contact, which can be 'SUBSCRIBED', 'UNSUBSCRIBED', or 'NOT_SPECIFIED'.
 */
enum StatusState: string
{
    case SUBSCRIBED = 'SUBSCRIBED';

    case UNSUBSCRIBED = 'UNSUBSCRIBED';

    case NOT_SPECIFIED = 'NOT_SPECIFIED';
}
