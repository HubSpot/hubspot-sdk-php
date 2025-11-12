<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions\MultiStringPropertyOperation;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Events\EventDefinitions\NumOccurrencesRefineBy;
use HubspotSDK\Events\EventDefinitions\SetOccurrencesRefineBy;

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
