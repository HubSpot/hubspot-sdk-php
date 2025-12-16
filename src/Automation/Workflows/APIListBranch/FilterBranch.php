<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIListBranch;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\PublicAndFilterBranch;
use HubspotSDK\PublicAssociationFilterBranch;
use HubspotSDK\PublicNotAllFilterBranch;
use HubspotSDK\PublicNotAnyFilterBranch;
use HubspotSDK\PublicOrFilterBranch;
use HubspotSDK\PublicPropertyAssociationFilterBranch;
use HubspotSDK\PublicRestrictedFilterBranch;
use HubspotSDK\PublicUnifiedEventsFilterBranch;

/**
 * @phpstan-import-type PublicOrFilterBranchShape from \HubspotSDK\PublicOrFilterBranch
 * @phpstan-import-type PublicAndFilterBranchShape from \HubspotSDK\PublicAndFilterBranch
 * @phpstan-import-type PublicNotAllFilterBranchShape from \HubspotSDK\PublicNotAllFilterBranch
 * @phpstan-import-type PublicNotAnyFilterBranchShape from \HubspotSDK\PublicNotAnyFilterBranch
 * @phpstan-import-type PublicRestrictedFilterBranchShape from \HubspotSDK\PublicRestrictedFilterBranch
 * @phpstan-import-type PublicUnifiedEventsFilterBranchShape from \HubspotSDK\PublicUnifiedEventsFilterBranch
 * @phpstan-import-type PublicPropertyAssociationFilterBranchShape from \HubspotSDK\PublicPropertyAssociationFilterBranch
 * @phpstan-import-type PublicAssociationFilterBranchShape from \HubspotSDK\PublicAssociationFilterBranch
 *
 * @phpstan-type FilterBranchShape = PublicOrFilterBranchShape|PublicAndFilterBranchShape|PublicNotAllFilterBranchShape|PublicNotAnyFilterBranchShape|PublicRestrictedFilterBranchShape|PublicUnifiedEventsFilterBranchShape|PublicPropertyAssociationFilterBranchShape|PublicAssociationFilterBranchShape
 */
final class FilterBranch implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            PublicOrFilterBranch::class,
            PublicAndFilterBranch::class,
            PublicNotAllFilterBranch::class,
            PublicNotAnyFilterBranch::class,
            PublicRestrictedFilterBranch::class,
            PublicUnifiedEventsFilterBranch::class,
            PublicPropertyAssociationFilterBranch::class,
            PublicAssociationFilterBranch::class,
        ];
    }
}
