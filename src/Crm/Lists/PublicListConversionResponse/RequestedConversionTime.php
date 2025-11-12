<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists\PublicListConversionResponse;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Crm\Lists\PublicListConversionDate;
use HubspotSDK\Crm\Lists\PublicListConversionInactivity;

final class RequestedConversionTime implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            PublicListConversionDate::class, PublicListConversionInactivity::class,
        ];
    }
}
