<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIFlowBatchFetchMigrationWorkflowIDCoordinate;

/**
 * The type of input this is, can be FLOW_ID or WORKFLOW_ID.
 */
enum Type: string
{
    case WORKFLOW_ID = 'WORKFLOW_ID';
}
