<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type RandomAccessCollectionResponseWithTotalHubDBTableRowV3Shape from \HubspotSDK\Cms\Hubdb\RandomAccessCollectionResponseWithTotalHubDBTableRowV3
 * @phpstan-import-type StreamingCollectionResponseWithTotalHubDBTableRowV3Shape from \HubspotSDK\Cms\Hubdb\StreamingCollectionResponseWithTotalHubDBTableRowV3
 *
 * @phpstan-type UnifiedCollectionResponseWithTotalBaseHubDBTableRowV3Variants = RandomAccessCollectionResponseWithTotalHubDBTableRowV3|StreamingCollectionResponseWithTotalHubDBTableRowV3
 * @phpstan-type UnifiedCollectionResponseWithTotalBaseHubDBTableRowV3Shape = UnifiedCollectionResponseWithTotalBaseHubDBTableRowV3Variants|RandomAccessCollectionResponseWithTotalHubDBTableRowV3Shape|StreamingCollectionResponseWithTotalHubDBTableRowV3Shape
 */
final class UnifiedCollectionResponseWithTotalBaseHubDBTableRowV3 implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            RandomAccessCollectionResponseWithTotalHubDBTableRowV3::class,
            StreamingCollectionResponseWithTotalHubDBTableRowV3::class,
        ];
    }
}
