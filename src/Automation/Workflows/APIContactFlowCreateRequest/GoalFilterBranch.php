<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIContactFlowCreateRequest;

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

final class GoalFilterBranch implements ConverterSource
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
