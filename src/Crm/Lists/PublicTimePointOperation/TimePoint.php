<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists\PublicTimePointOperation;

use HubSpotSDK\Core\Concerns\SdkUnion;
use HubSpotSDK\Core\Conversion\Contracts\Converter;
use HubSpotSDK\Core\Conversion\Contracts\ConverterSource;
use HubSpotSDK\Crm\Lists\PublicDatePoint;
use HubSpotSDK\Crm\Lists\PublicIndexedTimePoint;
use HubSpotSDK\Crm\Lists\PublicPropertyReferencedTime;

/**
 * Defines the specific point in time for the operation, which can be a date, indexed time, or property-referenced time.
 *
 * @phpstan-import-type PublicDatePointShape from \HubSpotSDK\Crm\Lists\PublicDatePoint
 * @phpstan-import-type PublicIndexedTimePointShape from \HubSpotSDK\Crm\Lists\PublicIndexedTimePoint
 * @phpstan-import-type PublicPropertyReferencedTimeShape from \HubSpotSDK\Crm\Lists\PublicPropertyReferencedTime
 *
 * @phpstan-type TimePointVariants = PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime
 * @phpstan-type TimePointShape = TimePointVariants|PublicDatePointShape|PublicIndexedTimePointShape|PublicPropertyReferencedTimeShape
 */
final class TimePoint implements ConverterSource
{
    use SdkUnion;

    public static function discriminator(): string
    {
        return 'timeType';
    }

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'DATE' => PublicDatePoint::class,
            'INDEXED' => PublicIndexedTimePoint::class,
            'PROPERTY_REFERENCED' => PublicPropertyReferencedTime::class,
        ];
    }
}
