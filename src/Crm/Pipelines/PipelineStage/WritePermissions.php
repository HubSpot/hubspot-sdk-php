<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Pipelines\PipelineStage;

/**
 * Defines the level of write access for the pipeline stage, with possible values being CRM_PERMISSIONS_ENFORCEMENT, READ_ONLY, or INTERNAL_ONLY.
 */
enum WritePermissions: string
{
    case CRM_PERMISSIONS_ENFORCEMENT = 'CRM_PERMISSIONS_ENFORCEMENT';

    case INTERNAL_ONLY = 'INTERNAL_ONLY';

    case READ_ONLY = 'READ_ONLY';
}
