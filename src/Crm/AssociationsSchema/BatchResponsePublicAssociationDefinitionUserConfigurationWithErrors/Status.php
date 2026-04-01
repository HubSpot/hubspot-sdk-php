<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\AssociationsSchema\BatchResponsePublicAssociationDefinitionUserConfigurationWithErrors;

enum Status: string
{
    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';

    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';
}
