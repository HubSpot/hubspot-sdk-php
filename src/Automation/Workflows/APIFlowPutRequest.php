<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type APIContactFlowPutRequestShape from \HubspotSDK\Automation\Workflows\APIContactFlowPutRequest
 * @phpstan-import-type APIPlatformFlowPutRequestShape from \HubspotSDK\Automation\Workflows\APIPlatformFlowPutRequest
 *
 * @phpstan-type APIFlowPutRequestVariants = APIContactFlowPutRequest|APIPlatformFlowPutRequest
 * @phpstan-type APIFlowPutRequestShape = APIFlowPutRequestVariants|APIContactFlowPutRequestShape|APIPlatformFlowPutRequestShape
 */
final class APIFlowPutRequest implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [APIContactFlowPutRequest::class, APIPlatformFlowPutRequest::class];
    }
}
