<?php

declare(strict_types=1);

namespace HubspotSDK\Events\MultiStringPropertyOperation;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Events\NumOccurrencesRefineBy;
use HubspotSDK\Events\SetOccurrencesRefineBy;

/**
 * @phpstan-import-type NumOccurrencesRefineByShape from \HubspotSDK\Events\NumOccurrencesRefineBy
 * @phpstan-import-type SetOccurrencesRefineByShape from \HubspotSDK\Events\SetOccurrencesRefineBy
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
