<?php

declare(strict_types=1);

namespace HubSpotSDK\WebhooksJournal\Subscriptions\SubscriptionCreateParams;

enum SubscriptionType: string
{
    case GDPR_PRIVACY_DELETION = 'GDPR_PRIVACY_DELETION';
}
