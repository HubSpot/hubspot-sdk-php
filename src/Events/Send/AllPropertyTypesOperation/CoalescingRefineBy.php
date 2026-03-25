<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Send\AllPropertyTypesOperation;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Events\Send\NumOccurrencesRefineBy;
use HubspotSDK\Events\Send\SetOccurrencesRefineBy;

/**
 * @phpstan-import-type NumOccurrencesRefineByShape from \HubspotSDK\Events\Send\NumOccurrencesRefineBy
 * @phpstan-import-type SetOccurrencesRefineByShape from \HubspotSDK\Events\Send\SetOccurrencesRefineBy
 *
 * @phpstan-type CoalescingRefineByVariants = NumOccurrencesRefineBy|SetOccurrencesRefineBy
 * @phpstan-type CoalescingRefineByShape = CoalescingRefineByVariants|NumOccurrencesRefineByShape|SetOccurrencesRefineByShape
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
