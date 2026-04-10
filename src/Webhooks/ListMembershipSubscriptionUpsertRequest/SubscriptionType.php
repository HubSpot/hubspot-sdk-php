<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks\ListMembershipSubscriptionUpsertRequest;

enum SubscriptionType: string
{
    case OBJECT = 'OBJECT';

    case ASSOCIATION = 'ASSOCIATION';

    case EVENT = 'EVENT';

    case APP_LIFECYCLE_EVENT = 'APP_LIFECYCLE_EVENT';

    case LIST_MEMBERSHIP = 'LIST_MEMBERSHIP';
}
