<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists\PublicListConversionResponse;

use HubSpotSDK\Core\Concerns\SdkUnion;
use HubSpotSDK\Core\Conversion\Contracts\Converter;
use HubSpotSDK\Core\Conversion\Contracts\ConverterSource;
use HubSpotSDK\Crm\Lists\PublicListConversionDate;
use HubSpotSDK\Crm\Lists\PublicListConversionInactivity;

/**
 * The scheduled time for the list conversion, which can be based on a specific date or inactivity period.
 *
 * @phpstan-import-type PublicListConversionDateShape from \HubSpotSDK\Crm\Lists\PublicListConversionDate
 * @phpstan-import-type PublicListConversionInactivityShape from \HubSpotSDK\Crm\Lists\PublicListConversionInactivity
 *
 * @phpstan-type RequestedConversionTimeVariants = PublicListConversionDate|PublicListConversionInactivity
 * @phpstan-type RequestedConversionTimeShape = RequestedConversionTimeVariants|PublicListConversionDateShape|PublicListConversionInactivityShape
 */
final class RequestedConversionTime implements ConverterSource
{
    use SdkUnion;

    public static function discriminator(): string
    {
        return 'conversionType';
    }

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'CONVERSION_DATE' => PublicListConversionDate::class,
            'INACTIVITY' => PublicListConversionInactivity::class,
        ];
    }
}
