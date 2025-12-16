<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type APIContactFlowShape from \HubspotSDK\Automation\Workflows\APIContactFlow
 * @phpstan-import-type APIPlatformFlowShape from \HubspotSDK\Automation\Workflows\APIPlatformFlow
 *
 * @phpstan-type APIFlowShape = APIContactFlowShape|APIPlatformFlowShape
 */
final class APIFlow implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [APIContactFlow::class, APIPlatformFlow::class];
    }
}
