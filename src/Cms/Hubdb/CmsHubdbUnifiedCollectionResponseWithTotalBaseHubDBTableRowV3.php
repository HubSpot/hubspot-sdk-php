<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

final class CmsHubdbUnifiedCollectionResponseWithTotalBaseHubDBTableRowV3 implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
     */
    public static function variants(): array
    {
        return [
            CmsHubdbRandomAccessCollectionResponseWithTotalHubDBTableRowV3::class,
            CmsHubdbStreamingCollectionResponseWithTotalHubDBTableRowV3::class,
        ];
    }
}
