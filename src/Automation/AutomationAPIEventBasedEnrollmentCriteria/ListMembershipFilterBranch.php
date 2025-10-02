<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\AutomationAPIEventBasedEnrollmentCriteria;

use HubspotSDK\Automation\AutomationPublicAndFilterBranch;
use HubspotSDK\Automation\AutomationPublicAssociationFilterBranch;
use HubspotSDK\Automation\AutomationPublicNotAllFilterBranch;
use HubspotSDK\Automation\AutomationPublicNotAnyFilterBranch;
use HubspotSDK\Automation\AutomationPublicOrFilterBranch;
use HubspotSDK\Automation\AutomationPublicPropertyAssociationFilterBranch;
use HubspotSDK\Automation\AutomationPublicRestrictedFilterBranch;
use HubspotSDK\Automation\AutomationPublicUnifiedEventsFilterBranch;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

final class ListMembershipFilterBranch implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
     */
    public static function variants(): array
    {
        return [
            AutomationPublicOrFilterBranch::class,
            AutomationPublicAndFilterBranch::class,
            AutomationPublicNotAllFilterBranch::class,
            AutomationPublicNotAnyFilterBranch::class,
            AutomationPublicRestrictedFilterBranch::class,
            AutomationPublicUnifiedEventsFilterBranch::class,
            AutomationPublicPropertyAssociationFilterBranch::class,
            AutomationPublicAssociationFilterBranch::class,
        ];
    }
}
