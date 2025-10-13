<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIFlowBatchFetchMigrationFlowIDCoordinate;

/**
 * The type of input this is, can be FLOW_ID or WORKFLOW_ID.
 */
enum Type: string
{
    case FLOW_ID = 'FLOW_ID';
}
