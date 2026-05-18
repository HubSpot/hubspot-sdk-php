<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\BatchResponsePublicAssociationMultiWithLabelWithErrors;

enum Status: string
{
    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';

    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';
}
