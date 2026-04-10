<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists\PublicRangedTimeOperation;

use HubSpotSDK\Core\Concerns\SdkUnion;
use HubSpotSDK\Core\Conversion\Contracts\Converter;
use HubSpotSDK\Core\Conversion\Contracts\ConverterSource;
use HubSpotSDK\Crm\Lists\PublicDatePoint;
use HubSpotSDK\Crm\Lists\PublicIndexedTimePoint;
use HubSpotSDK\Crm\Lists\PublicPropertyReferencedTime;

/**
 * Defines the upper bound time point for the operation.
 *
 * @phpstan-import-type PublicDatePointShape from \HubSpotSDK\Crm\Lists\PublicDatePoint
 * @phpstan-import-type PublicIndexedTimePointShape from \HubSpotSDK\Crm\Lists\PublicIndexedTimePoint
 * @phpstan-import-type PublicPropertyReferencedTimeShape from \HubSpotSDK\Crm\Lists\PublicPropertyReferencedTime
 *
 * @phpstan-type UpperBoundTimePointVariants = PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime
 * @phpstan-type UpperBoundTimePointShape = UpperBoundTimePointVariants|PublicDatePointShape|PublicIndexedTimePointShape|PublicPropertyReferencedTimeShape
 */
final class UpperBoundTimePoint implements ConverterSource
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
