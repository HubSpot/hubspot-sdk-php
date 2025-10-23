<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\Schema\V4\BatchResponsePublicAssociationDefinitionUserConfigurationWithErrors;

enum Status: string
{
    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';

    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';
}
