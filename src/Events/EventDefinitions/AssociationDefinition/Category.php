<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions\AssociationDefinition;

/**
 * The category of the association. Can be: "HUBSPOT_DEFINED", "USER_DEFINED", or "INTEGRATOR_DEFINED".
 */
enum Category: string
{
    case HUBSPOT_DEFINED = 'HUBSPOT_DEFINED';

    case USER_DEFINED = 'USER_DEFINED';

    case INTEGRATOR_DEFINED = 'INTEGRATOR_DEFINED';
}
