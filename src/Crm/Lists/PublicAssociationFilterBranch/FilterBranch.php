<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists\PublicAssociationFilterBranch;

use HubSpotSDK\Core\Concerns\SdkUnion;
use HubSpotSDK\Core\Conversion\Contracts\Converter;
use HubSpotSDK\Core\Conversion\Contracts\ConverterSource;
use HubSpotSDK\Crm\Lists\PublicAndFilterBranch;
use HubSpotSDK\Crm\Lists\PublicAssociationFilterBranch;
use HubSpotSDK\Crm\Lists\PublicNotAllFilterBranch;
use HubSpotSDK\Crm\Lists\PublicNotAnyFilterBranch;
use HubSpotSDK\Crm\Lists\PublicOrFilterBranch;
use HubSpotSDK\Crm\Lists\PublicPropertyAssociationFilterBranch;
use HubSpotSDK\Crm\Lists\PublicRestrictedFilterBranch;
use HubSpotSDK\Crm\Lists\PublicUnifiedEventsFilterBranch;

/**
 * @phpstan-import-type PublicOrFilterBranchShape from \HubSpotSDK\Crm\Lists\PublicOrFilterBranch
 * @phpstan-import-type PublicAndFilterBranchShape from \HubSpotSDK\Crm\Lists\PublicAndFilterBranch
 * @phpstan-import-type PublicNotAllFilterBranchShape from \HubSpotSDK\Crm\Lists\PublicNotAllFilterBranch
 * @phpstan-import-type PublicNotAnyFilterBranchShape from \HubSpotSDK\Crm\Lists\PublicNotAnyFilterBranch
 * @phpstan-import-type PublicRestrictedFilterBranchShape from \HubSpotSDK\Crm\Lists\PublicRestrictedFilterBranch
 * @phpstan-import-type PublicUnifiedEventsFilterBranchShape from \HubSpotSDK\Crm\Lists\PublicUnifiedEventsFilterBranch
 * @phpstan-import-type PublicPropertyAssociationFilterBranchShape from \HubSpotSDK\Crm\Lists\PublicPropertyAssociationFilterBranch
 * @phpstan-import-type PublicAssociationFilterBranchShape from \HubSpotSDK\Crm\Lists\PublicAssociationFilterBranch
 *
 * @phpstan-type FilterBranchVariants = mixed
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
