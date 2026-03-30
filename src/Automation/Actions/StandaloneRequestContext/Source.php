<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\StandaloneRequestContext;

/**
 * Indicates the source of the request, with the default value being 'STANDALONE'.
 */
enum Source: string
{
    case STANDALONE = 'STANDALONE';
}
