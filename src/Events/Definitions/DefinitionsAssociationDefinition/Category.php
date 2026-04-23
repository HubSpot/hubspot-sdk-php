<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions\DefinitionsAssociationDefinition;

/**
 * The error category.
 */
enum Category: string
{
    case HUBSPOT_DEFINED = 'HUBSPOT_DEFINED';

    case INTEGRATOR_DEFINED = 'INTEGRATOR_DEFINED';

    case USER_DEFINED = 'USER_DEFINED';

    case WORK = 'WORK';
}
