<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists\PublicPropertyAssociationInListFilter;

/**
 * Indicates the type of filter being applied (PROPERTY_ASSOCIATION).
 */
enum FilterType: string
{
    case PROPERTY_ASSOCIATION = 'PROPERTY_ASSOCIATION';
}
