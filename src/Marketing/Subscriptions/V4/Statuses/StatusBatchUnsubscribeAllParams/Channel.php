<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchUnsubscribeAllParams;

/**
 * The channel type for the subscription type. Currently, the only supported channel type is `EMAIL`.
 */
enum Channel: string
{
    case EMAIL = 'EMAIL';
}
