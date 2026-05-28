<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Hubdb;

use HubSpotSDK\Core\Concerns\SdkUnion;
use HubSpotSDK\Core\Conversion\Contracts\Converter;
use HubSpotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type RandomAccessCollectionResponseWithTotalHubDBTableRowV3Shape from \HubSpotSDK\Cms\Hubdb\RandomAccessCollectionResponseWithTotalHubDBTableRowV3
 * @phpstan-import-type StreamingCollectionResponseWithTotalHubDBTableRowV3Shape from \HubSpotSDK\Cms\Hubdb\StreamingCollectionResponseWithTotalHubDBTableRowV3
 *
 * @phpstan-type UnifiedCollectionResponseWithTotalBaseHubDBTableRowV3Variants = RandomAccessCollectionResponseWithTotalHubDBTableRowV3|StreamingCollectionResponseWithTotalHubDBTableRowV3
 * @phpstan-type UnifiedCollectionResponseWithTotalBaseHubDBTableRowV3Shape = UnifiedCollectionResponseWithTotalBaseHubDBTableRowV3Variants|RandomAccessCollectionResponseWithTotalHubDBTableRowV3Shape|StreamingCollectionResponseWithTotalHubDBTableRowV3Shape
 */
final class UnifiedCollectionResponseWithTotalBaseHubDBTableRowV3 implements ConverterSource
{
    use SdkUnion;

    public static function discriminator(): string
    {
        return 'type';
    }

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'RANDOM_ACCESS' => RandomAccessCollectionResponseWithTotalHubDBTableRowV3::class,
            'STREAMING' => StreamingCollectionResponseWithTotalHubDBTableRowV3::class,
        ];
    }
}
