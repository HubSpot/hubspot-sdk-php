<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks\SubscriptionResponse1;

enum SubscriptionType: string
{
    case APP_LIFECYCLE_EVENT = 'APP_LIFECYCLE_EVENT';

    case ASSOCIATION = 'ASSOCIATION';

    case EVENT = 'EVENT';

    case LIST_MEMBERSHIP = 'LIST_MEMBERSHIP';

    case OBJECT = 'OBJECT';
}
