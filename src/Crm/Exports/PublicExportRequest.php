<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Exports;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type PublicExportViewRequestShape from \HubspotSDK\Crm\Exports\PublicExportViewRequest
 * @phpstan-import-type PublicExportListRequestShape from \HubspotSDK\Crm\Exports\PublicExportListRequest
 *
 * @phpstan-type PublicExportRequestVariants = PublicExportViewRequest|PublicExportListRequest
 * @phpstan-type PublicExportRequestShape = PublicExportRequestVariants|PublicExportViewRequestShape|PublicExportListRequestShape
 */
final class PublicExportRequest implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [PublicExportViewRequest::class, PublicExportListRequest::class];
    }
}
