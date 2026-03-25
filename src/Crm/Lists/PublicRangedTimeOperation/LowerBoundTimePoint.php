<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists\PublicRangedTimeOperation;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Crm\Lists\PublicDatePoint;
use HubspotSDK\Crm\Lists\PublicIndexedTimePoint;
use HubspotSDK\Crm\Lists\PublicPropertyReferencedTime;

/**
 * Defines the lower bound time point for the operation.
 *
 * @phpstan-import-type PublicDatePointShape from \HubspotSDK\Crm\Lists\PublicDatePoint
 * @phpstan-import-type PublicIndexedTimePointShape from \HubspotSDK\Crm\Lists\PublicIndexedTimePoint
 * @phpstan-import-type PublicPropertyReferencedTimeShape from \HubspotSDK\Crm\Lists\PublicPropertyReferencedTime
 *
 * @phpstan-type LowerBoundTimePointVariants = PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime
 * @phpstan-type LowerBoundTimePointShape = LowerBoundTimePointVariants|PublicDatePointShape|PublicIndexedTimePointShape|PublicPropertyReferencedTimeShape
 */
final class LowerBoundTimePoint implements ConverterSource
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
