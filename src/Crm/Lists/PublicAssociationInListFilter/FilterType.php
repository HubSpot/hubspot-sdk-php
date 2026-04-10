<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists\PublicAssociationInListFilter;

/**
 * Indicates the type of filter being applied, which is 'ASSOCIATION' by default.
 */
enum FilterType: string
{
    case ASSOCIATION = 'ASSOCIATION';
}
