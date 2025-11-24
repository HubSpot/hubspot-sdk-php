<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\PublicSubscriptionStatus;

/**
 * The legal reason for the current status of the subscription.
 */
enum LegalBasis: string
{
    case CONSENT_WITH_NOTICE = 'CONSENT_WITH_NOTICE';

    case LEGITIMATE_INTEREST_CLIENT = 'LEGITIMATE_INTEREST_CLIENT';

    case LEGITIMATE_INTEREST_OTHER = 'LEGITIMATE_INTEREST_OTHER';

    case LEGITIMATE_INTEREST_PQL = 'LEGITIMATE_INTEREST_PQL';

    case NON_GDPR = 'NON_GDPR';

    case PERFORMANCE_OF_CONTRACT = 'PERFORMANCE_OF_CONTRACT';

    case PROCESS_AND_STORE = 'PROCESS_AND_STORE';
}
