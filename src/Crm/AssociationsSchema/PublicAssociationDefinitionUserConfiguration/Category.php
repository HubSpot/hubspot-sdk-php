<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\AssociationsSchema\PublicAssociationDefinitionUserConfiguration;

/**
 * The category of the association, which can be HUBSPOT_DEFINED, INTEGRATOR_DEFINED, or USER_DEFINED.
 */
enum Category: string
{
    case HUBSPOT_DEFINED = 'HUBSPOT_DEFINED';

    case INTEGRATOR_DEFINED = 'INTEGRATOR_DEFINED';

    case USER_DEFINED = 'USER_DEFINED';

    case WORK = 'WORK';
}
