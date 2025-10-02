<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\V4\AssociationsV4BatchResponseVoid;

enum Status: string
{
    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';

    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';
}
