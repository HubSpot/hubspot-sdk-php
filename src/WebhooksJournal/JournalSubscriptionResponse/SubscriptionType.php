<?php

declare(strict_types=1);

namespace HubSpotSDK\WebhooksJournal\JournalSubscriptionResponse;

/**
 * The type of subscription, indicating the nature of events it pertains to. Valid values include 'OBJECT', 'ASSOCIATION', 'EVENT', 'APP_LIFECYCLE_EVENT', 'LIST_MEMBERSHIP', and 'GDPR_PRIVACY_DELETION'.
 */
enum SubscriptionType: string
{
    case APP_LIFECYCLE_EVENT = 'APP_LIFECYCLE_EVENT';

    case ASSOCIATION = 'ASSOCIATION';

    case EVENT = 'EVENT';

    case GDPR_PRIVACY_DELETION = 'GDPR_PRIVACY_DELETION';

    case LIST_MEMBERSHIP = 'LIST_MEMBERSHIP';

    case OBJECT = 'OBJECT';
}
