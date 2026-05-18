<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\AssociationSpecWithLabel;

/**
 * Association category. Can be HUBSPOT_DEFINED, USER_DEFINED, INTEGRATOR_DEFINED or WORK.
 */
enum Category: string
{
    case HUBSPOT_DEFINED = 'HUBSPOT_DEFINED';

    case INTEGRATOR_DEFINED = 'INTEGRATOR_DEFINED';

    case USER_DEFINED = 'USER_DEFINED';

    case WORK = 'WORK';
}
