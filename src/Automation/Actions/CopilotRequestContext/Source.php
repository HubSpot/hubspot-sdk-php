<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions\CopilotRequestContext;

/**
 * Indicates the source of the request, with the default value being 'COPILOT'.
 */
enum Source: string
{
    case COPILOT = 'COPILOT';
}
