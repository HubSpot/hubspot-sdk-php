<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\AutomationPublicFormSubmissionFilter;

use HubspotSDK\Automation\AutomationPublicAbsoluteComparativeTimestampRefineBy;
use HubspotSDK\Automation\AutomationPublicAbsoluteRangedTimestampRefineBy;
use HubspotSDK\Automation\AutomationPublicAllHistoryRefineBy;
use HubspotSDK\Automation\AutomationPublicNumOccurrencesRefineBy;
use HubspotSDK\Automation\AutomationPublicRangedTimeOperation;
use HubspotSDK\Automation\AutomationPublicRelativeComparativeTimestampRefineBy;
use HubspotSDK\Automation\AutomationPublicRelativeRangedTimestampRefineBy;
use HubspotSDK\Automation\AutomationPublicSetOccurrencesRefineBy;
use HubspotSDK\Automation\AutomationPublicTimePointOperation;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

final class PruningRefineBy implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
     */
    public static function variants(): array
    {
        return [
            AutomationPublicNumOccurrencesRefineBy::class,
            AutomationPublicSetOccurrencesRefineBy::class,
            AutomationPublicRelativeComparativeTimestampRefineBy::class,
            AutomationPublicRelativeRangedTimestampRefineBy::class,
            AutomationPublicAbsoluteComparativeTimestampRefineBy::class,
            AutomationPublicAbsoluteRangedTimestampRefineBy::class,
            AutomationPublicAllHistoryRefineBy::class,
            AutomationPublicTimePointOperation::class,
            AutomationPublicRangedTimeOperation::class,
        ];
    }
}
