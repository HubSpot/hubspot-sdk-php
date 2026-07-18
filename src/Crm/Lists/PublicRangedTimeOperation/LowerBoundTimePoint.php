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
 * Defines the lower bound time point for the operation.
 *
 * @phpstan-import-type PublicDatePointShape from \HubSpotSDK\Crm\Lists\PublicDatePoint
 * @phpstan-import-type PublicIndexedTimePointShape from \HubSpotSDK\Crm\Lists\PublicIndexedTimePoint
 * @phpstan-import-type PublicPropertyReferencedTimeShape from \HubSpotSDK\Crm\Lists\PublicPropertyReferencedTime
 *
 * @phpstan-type LowerBoundTimePointVariants = PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime
 * @phpstan-type LowerBoundTimePointShape = LowerBoundTimePointVariants|PublicDatePointShape|PublicIndexedTimePointShape|PublicPropertyReferencedTimeShape
 */
final class LowerBoundTimePoint implements ConverterSource
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
