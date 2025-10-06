<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\PublicAssociationFilterBranch;

use HubspotSDK\Automation\Workflows\PublicAndFilterBranch;
use HubspotSDK\Automation\Workflows\PublicAssociationFilterBranch;
use HubspotSDK\Automation\Workflows\PublicNotAllFilterBranch;
use HubspotSDK\Automation\Workflows\PublicNotAnyFilterBranch;
use HubspotSDK\Automation\Workflows\PublicOrFilterBranch;
use HubspotSDK\Automation\Workflows\PublicPropertyAssociationFilterBranch;
use HubspotSDK\Automation\Workflows\PublicRestrictedFilterBranch;
use HubspotSDK\Automation\Workflows\PublicUnifiedEventsFilterBranch;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

final class FilterBranch implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
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
