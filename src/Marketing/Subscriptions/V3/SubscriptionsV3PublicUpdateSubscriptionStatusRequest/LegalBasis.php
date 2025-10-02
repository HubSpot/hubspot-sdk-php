<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V3\SubscriptionsV3PublicUpdateSubscriptionStatusRequest;

enum LegalBasis: string
{
    case LEGITIMATE_INTEREST_PQL = 'LEGITIMATE_INTEREST_PQL';

    case LEGITIMATE_INTEREST_CLIENT = 'LEGITIMATE_INTEREST_CLIENT';

    case PERFORMANCE_OF_CONTRACT = 'PERFORMANCE_OF_CONTRACT';

    case CONSENT_WITH_NOTICE = 'CONSENT_WITH_NOTICE';

    case NON_GDPR = 'NON_GDPR';

    case PROCESS_AND_STORE = 'PROCESS_AND_STORE';

    case LEGITIMATE_INTEREST_OTHER = 'LEGITIMATE_INTEREST_OTHER';
}
