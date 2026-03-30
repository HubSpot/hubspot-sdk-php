<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\AgentRequestContext;

/**
 * Indicates the source of the request, with the default value being 'AGENTS'.
 */
enum Source: string
{
    case AGENTS = 'AGENTS';
}
