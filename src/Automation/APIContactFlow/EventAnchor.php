<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\APIContactFlow;

use HubspotSDK\Automation\APIContactPropertyAnchor;
use HubspotSDK\Automation\APIStaticDateAnchor;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

final class EventAnchor implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
     */
    public static function variants(): array
    {
        return [APIContactPropertyAnchor::class, APIStaticDateAnchor::class];
    }
}
