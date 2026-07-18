<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions\RangedTimeOperation;

use HubSpotSDK\Core\Concerns\SdkUnion;
use HubSpotSDK\Core\Conversion\Contracts\Converter;
use HubSpotSDK\Core\Conversion\Contracts\ConverterSource;
use HubSpotSDK\Events\Definitions\DatePoint;
use HubSpotSDK\Events\Definitions\IndexedTimePoint;
use HubSpotSDK\Events\Definitions\PropertyReferencedTime;

/**
 * @phpstan-import-type DatePointShape from \HubSpotSDK\Events\Definitions\DatePoint
 * @phpstan-import-type IndexedTimePointShape from \HubSpotSDK\Events\Definitions\IndexedTimePoint
 * @phpstan-import-type PropertyReferencedTimeShape from \HubSpotSDK\Events\Definitions\PropertyReferencedTime
 *
 * @phpstan-type UpperBoundTimePointVariants = DatePoint|IndexedTimePoint|PropertyReferencedTime
 * @phpstan-type UpperBoundTimePointShape = UpperBoundTimePointVariants|DatePointShape|IndexedTimePointShape|PropertyReferencedTimeShape
 */
final class UpperBoundTimePoint implements ConverterSource
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
            'DATE' => DatePoint::class,
            'INDEXED' => IndexedTimePoint::class,
            'PROPERTY_REFERENCED' => PropertyReferencedTime::class,
        ];
    }
}
