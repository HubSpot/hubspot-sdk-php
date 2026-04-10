<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\AssociationsSchema\BatchResponsePublicAssociationDefinitionConfigurationUpdateResult;

/**
 * The current status of the batch update operation, which can be CANCELED, COMPLETE, PENDING, or PROCESSING.
 */
enum Status: string
{
    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';

    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';
}
