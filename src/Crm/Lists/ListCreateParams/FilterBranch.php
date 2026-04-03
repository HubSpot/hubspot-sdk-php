<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists\ListCreateParams;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Crm\Lists\PublicAndFilterBranch;
use HubspotSDK\Crm\Lists\PublicAssociationFilterBranch;
use HubspotSDK\Crm\Lists\PublicNotAllFilterBranch;
use HubspotSDK\Crm\Lists\PublicNotAnyFilterBranch;
use HubspotSDK\Crm\Lists\PublicOrFilterBranch;
use HubspotSDK\Crm\Lists\PublicPropertyAssociationFilterBranch;
use HubspotSDK\Crm\Lists\PublicRestrictedFilterBranch;
use HubspotSDK\Crm\Lists\PublicUnifiedEventsFilterBranch;

/**
 * Filter branch object containing filtering criteria for the list.
 *
 * @phpstan-import-type PublicOrFilterBranchShape from \HubspotSDK\Crm\Lists\PublicOrFilterBranch
 * @phpstan-import-type PublicAndFilterBranchShape from \HubspotSDK\Crm\Lists\PublicAndFilterBranch
 * @phpstan-import-type PublicNotAllFilterBranchShape from \HubspotSDK\Crm\Lists\PublicNotAllFilterBranch
 * @phpstan-import-type PublicNotAnyFilterBranchShape from \HubspotSDK\Crm\Lists\PublicNotAnyFilterBranch
 * @phpstan-import-type PublicRestrictedFilterBranchShape from \HubspotSDK\Crm\Lists\PublicRestrictedFilterBranch
 * @phpstan-import-type PublicUnifiedEventsFilterBranchShape from \HubspotSDK\Crm\Lists\PublicUnifiedEventsFilterBranch
 * @phpstan-import-type PublicPropertyAssociationFilterBranchShape from \HubspotSDK\Crm\Lists\PublicPropertyAssociationFilterBranch
 * @phpstan-import-type PublicAssociationFilterBranchShape from \HubspotSDK\Crm\Lists\PublicAssociationFilterBranch
 *
 * @phpstan-type FilterBranchVariants = PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch
 * @phpstan-type FilterBranchShape = FilterBranchVariants|PublicOrFilterBranchShape|PublicAndFilterBranchShape|PublicNotAllFilterBranchShape|PublicNotAnyFilterBranchShape|PublicRestrictedFilterBranchShape|PublicUnifiedEventsFilterBranchShape|PublicPropertyAssociationFilterBranchShape|PublicAssociationFilterBranchShape
 */
final class FilterBranch implements ConverterSource
{
    use SdkUnion;

    public static function discriminator(): string
    {
        return 'filterBranchType';
    }

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'OR' => PublicOrFilterBranch::class,
            'AND' => PublicAndFilterBranch::class,
            'NOT_ALL' => PublicNotAllFilterBranch::class,
            'NOT_ANY' => PublicNotAnyFilterBranch::class,
            'RESTRICTED' => PublicRestrictedFilterBranch::class,
            'UNIFIED_EVENTS' => PublicUnifiedEventsFilterBranch::class,
            'PROPERTY_ASSOCIATION' => PublicPropertyAssociationFilterBranch::class,
            'ASSOCIATION' => PublicAssociationFilterBranch::class,
        ];
    }
}
