<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIContactFlowCreateRequest;

use HubspotSDK\Automation\Workflows\APIContactPropertyAnchor;
use HubspotSDK\Automation\Workflows\APIStaticDateAnchor;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type APIContactPropertyAnchorShape from \HubspotSDK\Automation\Workflows\APIContactPropertyAnchor
 * @phpstan-import-type APIStaticDateAnchorShape from \HubspotSDK\Automation\Workflows\APIStaticDateAnchor
 *
 * @phpstan-type EventAnchorVariants = APIContactPropertyAnchor|APIStaticDateAnchor
 * @phpstan-type EventAnchorShape = EventAnchorVariants|APIContactPropertyAnchorShape|APIStaticDateAnchorShape
 */
final class EventAnchor implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [APIContactPropertyAnchor::class, APIStaticDateAnchor::class];
    }
}
