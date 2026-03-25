<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists\PublicTimePointOperation;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Crm\Lists\PublicDatePoint;
use HubspotSDK\Crm\Lists\PublicIndexedTimePoint;
use HubspotSDK\Crm\Lists\PublicPropertyReferencedTime;

/**
 * Defines the specific point in time for the operation, which can be a date, indexed time, or property-referenced time.
 *
 * @phpstan-import-type PublicDatePointShape from \HubspotSDK\Crm\Lists\PublicDatePoint
 * @phpstan-import-type PublicIndexedTimePointShape from \HubspotSDK\Crm\Lists\PublicIndexedTimePoint
 * @phpstan-import-type PublicPropertyReferencedTimeShape from \HubspotSDK\Crm\Lists\PublicPropertyReferencedTime
 *
 * @phpstan-type TimePointVariants = PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime
 * @phpstan-type TimePointShape = TimePointVariants|PublicDatePointShape|PublicIndexedTimePointShape|PublicPropertyReferencedTimeShape
 */
final class TimePoint implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            PublicDatePoint::class,
            PublicIndexedTimePoint::class,
            PublicPropertyReferencedTime::class,
        ];
    }
}
