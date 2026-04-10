<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions\MultiStringPropertyOperation;

use HubSpotSDK\Core\Concerns\SdkUnion;
use HubSpotSDK\Core\Conversion\Contracts\Converter;
use HubSpotSDK\Core\Conversion\Contracts\ConverterSource;
use HubSpotSDK\Events\Definitions\NumOccurrencesRefineBy;
use HubSpotSDK\Events\Definitions\SetOccurrencesRefineBy;

/**
 * @phpstan-import-type NumOccurrencesRefineByShape from \HubSpotSDK\Events\Definitions\NumOccurrencesRefineBy
 * @phpstan-import-type SetOccurrencesRefineByShape from \HubSpotSDK\Events\Definitions\SetOccurrencesRefineBy
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
