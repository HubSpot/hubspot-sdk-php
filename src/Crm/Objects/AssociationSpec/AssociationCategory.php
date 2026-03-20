<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\AssociationSpec;

/**
 * The category of the association, such as "HUBSPOT_DEFINED".
 */
enum AssociationCategory: string
{
    case HUBSPOT_DEFINED = 'HUBSPOT_DEFINED';

    case INTEGRATOR_DEFINED = 'INTEGRATOR_DEFINED';

    case USER_DEFINED = 'USER_DEFINED';

    case WORK = 'WORK';
}
