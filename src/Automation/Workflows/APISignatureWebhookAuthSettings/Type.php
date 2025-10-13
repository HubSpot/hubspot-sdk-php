<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APISignatureWebhookAuthSettings;

/**
 * The type of webhook auth settings this is, can be: "AUTH_KEY" or "SIGNATURE".
 */
enum Type: string
{
    case SIGNATURE = 'SIGNATURE';
}
