<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Exports;

use HubSpotSDK\Core\Concerns\SdkUnion;
use HubSpotSDK\Core\Conversion\Contracts\Converter;
use HubSpotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type PublicExportViewRequestShape from \HubSpotSDK\Crm\Exports\PublicExportViewRequest
 * @phpstan-import-type PublicExportListRequestShape from \HubSpotSDK\Crm\Exports\PublicExportListRequest
 *
 * @phpstan-type PublicExportRequestVariants = PublicExportViewRequest|PublicExportListRequest
 * @phpstan-type PublicExportRequestShape = PublicExportRequestVariants|PublicExportViewRequestShape|PublicExportListRequestShape
 */
final class PublicExportRequest implements ConverterSource
{
    use SdkUnion;

    public static function discriminator(): string
    {
        return 'exportType';
    }

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'VIEW' => PublicExportViewRequest::class,
            'LIST' => PublicExportListRequest::class,
        ];
    }
}
