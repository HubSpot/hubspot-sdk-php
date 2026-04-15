<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks\SubscriptionResponse1;

/**
 * The type of subscription, which can be one of 'OBJECT', 'ASSOCIATION', 'EVENT', 'APP_LIFECYCLE_EVENT', 'LIST_MEMBERSHIP', or 'GDPR_PRIVACY_DELETION'.
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
