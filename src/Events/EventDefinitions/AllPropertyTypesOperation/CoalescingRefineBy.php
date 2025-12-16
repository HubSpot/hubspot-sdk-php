<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions\AllPropertyTypesOperation;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Events\EventDefinitions\NumOccurrencesRefineBy;
use HubspotSDK\Events\EventDefinitions\SetOccurrencesRefineBy;

/**
 * @phpstan-import-type NumOccurrencesRefineByShape from \HubspotSDK\Events\EventDefinitions\NumOccurrencesRefineBy
 * @phpstan-import-type SetOccurrencesRefineByShape from \HubspotSDK\Events\EventDefinitions\SetOccurrencesRefineBy
 *
 * @phpstan-type CoalescingRefineByShape = NumOccurrencesRefineByShape|SetOccurrencesRefineByShape
 */
final class CoalescingRefineBy implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [NumOccurrencesRefineBy::class, SetOccurrencesRefineBy::class];
    }
}
