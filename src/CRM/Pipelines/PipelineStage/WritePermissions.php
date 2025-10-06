<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Pipelines\PipelineStage;

enum WritePermissions: string
{
    case CRM_PERMISSIONS_ENFORCEMENT = 'CRM_PERMISSIONS_ENFORCEMENT';

    case READ_ONLY = 'READ_ONLY';

    case INTERNAL_ONLY = 'INTERNAL_ONLY';
}
