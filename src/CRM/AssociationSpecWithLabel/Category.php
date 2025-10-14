<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\AssociationSpecWithLabel;

/**
 * The category of this association type (either HUBSPOT_DEFINED or USER_DEFINED).
 */
enum Category: string
{
    case HUBSPOT_DEFINED = 'HUBSPOT_DEFINED';

    case USER_DEFINED = 'USER_DEFINED';

    case INTEGRATOR_DEFINED = 'INTEGRATOR_DEFINED';
}
