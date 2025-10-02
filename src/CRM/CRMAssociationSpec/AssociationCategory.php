<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\CRMAssociationSpec;

enum AssociationCategory: string
{
    case HUBSPOT_DEFINED = 'HUBSPOT_DEFINED';

    case USER_DEFINED = 'USER_DEFINED';

    case INTEGRATOR_DEFINED = 'INTEGRATOR_DEFINED';
}
