<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions\WorkflowsRequestContext;

/**
 * Indicates the source of the request, with the default value being WORKFLOWS.
 */
enum Source: string
{
    case WORKFLOWS = 'WORKFLOWS';
}
