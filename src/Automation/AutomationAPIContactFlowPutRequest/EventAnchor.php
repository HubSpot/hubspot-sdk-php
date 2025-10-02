<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\AutomationAPIContactFlowPutRequest;

use HubspotSDK\Automation\AutomationAPIContactPropertyAnchor;
use HubspotSDK\Automation\AutomationAPIStaticDateAnchor;
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
        return [
            AutomationAPIContactPropertyAnchor::class,
            AutomationAPIStaticDateAnchor::class,
        ];
    }
}
