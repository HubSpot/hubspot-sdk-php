<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4\PublicStatusRequest;

/**
 * The type of communication channel. Currently, only `EMAIL` is supported.
 */
enum Channel: string
{
    case EMAIL = 'EMAIL';
}
