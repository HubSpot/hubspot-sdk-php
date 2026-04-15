<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks\GdprPrivacyDeletionSubscriptionUpsertRequest;

enum SubscriptionType: string
{
    case OBJECT = 'OBJECT';

    case ASSOCIATION = 'ASSOCIATION';

    case EVENT = 'EVENT';

    case APP_LIFECYCLE_EVENT = 'APP_LIFECYCLE_EVENT';

    case LIST_MEMBERSHIP = 'LIST_MEMBERSHIP';

    case GDPR_PRIVACY_DELETION = 'GDPR_PRIVACY_DELETION';
}
