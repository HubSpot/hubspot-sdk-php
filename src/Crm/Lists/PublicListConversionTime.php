<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type PublicListConversionDateShape from \HubspotSDK\Crm\Lists\PublicListConversionDate
 * @phpstan-import-type PublicListConversionInactivityShape from \HubspotSDK\Crm\Lists\PublicListConversionInactivity
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
