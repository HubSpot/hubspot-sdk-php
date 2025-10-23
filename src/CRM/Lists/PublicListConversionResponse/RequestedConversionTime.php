<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Lists\PublicListConversionResponse;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\CRM\Lists\PublicListConversionDate;
use HubspotSDK\CRM\Lists\PublicListConversionInactivity;

final class RequestedConversionTime implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
     */
    public static function variants(): array
    {
        return [
            PublicListConversionDate::class, PublicListConversionInactivity::class,
        ];
    }
}
