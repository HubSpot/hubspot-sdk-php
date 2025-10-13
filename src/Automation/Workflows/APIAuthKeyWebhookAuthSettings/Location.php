<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIAuthKeyWebhookAuthSettings;

/**
 * Where in the request this auth key should be located: "HEADER" or "QUERY_PARAM".
 */
enum Location: string
{
    case HEADER = 'HEADER';

    case QUERY_PARAM = 'QUERY_PARAM';
}
