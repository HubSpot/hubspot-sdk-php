<?php

declare(strict_types=1);

namespace HubspotSDK\CommunicationPreferences\CommunicationPreferenceSubscribeParams;

/**
 * The legal basis for processing the subscription status change. It is an optional field and must be a string with valid values including 'LEGITIMATE_INTEREST_PQL', 'LEGITIMATE_INTEREST_CLIENT', 'PERFORMANCE_OF_CONTRACT', 'CONSENT_WITH_NOTICE', 'NON_GDPR', 'PROCESS_AND_STORE', and 'LEGITIMATE_INTEREST_OTHER'.
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
