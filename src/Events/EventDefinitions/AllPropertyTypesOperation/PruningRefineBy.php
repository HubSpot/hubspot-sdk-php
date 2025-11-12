<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions\AllPropertyTypesOperation;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Events\EventDefinitions\AbsoluteComparativeTimestampRefineBy;
use HubspotSDK\Events\EventDefinitions\AbsoluteRangedTimestampRefineBy;
use HubspotSDK\Events\EventDefinitions\AllHistoryRefineBy;
use HubspotSDK\Events\EventDefinitions\RangedTimeOperation;
use HubspotSDK\Events\EventDefinitions\RelativeComparativeTimestampRefineBy;
use HubspotSDK\Events\EventDefinitions\RelativeRangedTimestampRefineBy;
use HubspotSDK\Events\EventDefinitions\TimePointOperation;

final class PruningRefineBy implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            RelativeComparativeTimestampRefineBy::class,
            RelativeRangedTimestampRefineBy::class,
            AbsoluteComparativeTimestampRefineBy::class,
            AbsoluteRangedTimestampRefineBy::class,
            AllHistoryRefineBy::class,
            TimePointOperation::class,
            RangedTimeOperation::class,
        ];
    }
}
