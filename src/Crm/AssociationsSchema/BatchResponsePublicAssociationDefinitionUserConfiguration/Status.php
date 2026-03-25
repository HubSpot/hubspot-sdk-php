<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\AssociationsSchema\BatchResponsePublicAssociationDefinitionUserConfiguration;

/**
 * The current status of the batch operation, which can be CANCELED, COMPLETE, PENDING, or PROCESSING.
 */
enum Status: string
{
    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';

    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';
}
