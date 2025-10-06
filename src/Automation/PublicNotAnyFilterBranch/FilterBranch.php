<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\PublicNotAnyFilterBranch;

use HubspotSDK\Automation\PublicAndFilterBranch;
use HubspotSDK\Automation\PublicAssociationFilterBranch;
use HubspotSDK\Automation\PublicNotAllFilterBranch;
use HubspotSDK\Automation\PublicNotAnyFilterBranch;
use HubspotSDK\Automation\PublicOrFilterBranch;
use HubspotSDK\Automation\PublicPropertyAssociationFilterBranch;
use HubspotSDK\Automation\PublicRestrictedFilterBranch;
use HubspotSDK\Automation\PublicUnifiedEventsFilterBranch;
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
