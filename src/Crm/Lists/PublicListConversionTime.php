<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Concerns\SdkUnion;
use HubSpotSDK\Core\Conversion\Contracts\Converter;
use HubSpotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type PublicListConversionDateShape from \HubSpotSDK\Crm\Lists\PublicListConversionDate
 * @phpstan-import-type PublicListConversionInactivityShape from \HubSpotSDK\Crm\Lists\PublicListConversionInactivity
 *
 * @phpstan-type PublicListConversionTimeVariants = PublicListConversionDate|PublicListConversionInactivity
 * @phpstan-type PublicListConversionTimeShape = PublicListConversionTimeVariants|PublicListConversionDateShape|PublicListConversionInactivityShape
 */
final class PublicListConversionTime implements ConverterSource
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
