<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\BatchResponsePublicAssociation;

/**
 * The current status of the batch operation, with possible values: PENDING, PROCESSING, CANCELED, COMPLETE.
 */
enum Status: string
{
    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';

    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';
}
