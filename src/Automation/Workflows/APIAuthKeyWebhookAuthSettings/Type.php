<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIAuthKeyWebhookAuthSettings;

/**
 * The type of webhook auth settings this is, can be: "AUTH_KEY" or "SIGNATURE".
 */
enum Type: string
{
    case AUTH_KEY = 'AUTH_KEY';
}
