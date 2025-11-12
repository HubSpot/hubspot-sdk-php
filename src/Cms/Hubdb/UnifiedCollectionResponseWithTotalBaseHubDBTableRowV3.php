<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

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
