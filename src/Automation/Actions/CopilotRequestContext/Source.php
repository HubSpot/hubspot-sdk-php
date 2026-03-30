<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\CopilotRequestContext;

/**
 * Indicates the source of the request, with the default value being 'COPILOT'.
 */
enum Source: string
{
    case COPILOT = 'COPILOT';
}
