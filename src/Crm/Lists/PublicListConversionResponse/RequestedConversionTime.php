<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists\PublicListConversionResponse;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Crm\Lists\PublicListConversionDate;
use HubspotSDK\Crm\Lists\PublicListConversionInactivity;

/**
 * The scheduled time for the list conversion, which can be based on a specific date or inactivity period.
 *
 * @phpstan-import-type PublicListConversionDateShape from \HubspotSDK\Crm\Lists\PublicListConversionDate
 * @phpstan-import-type PublicListConversionInactivityShape from \HubspotSDK\Crm\Lists\PublicListConversionInactivity
 *
 * @phpstan-type RequestedConversionTimeVariants = PublicListConversionDate|PublicListConversionInactivity
 * @phpstan-type RequestedConversionTimeShape = RequestedConversionTimeVariants|PublicListConversionDateShape|PublicListConversionInactivityShape
 */
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
