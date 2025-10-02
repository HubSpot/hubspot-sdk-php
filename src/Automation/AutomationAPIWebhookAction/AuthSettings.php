<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\AutomationAPIWebhookAction;

use HubspotSDK\Automation\AutomationAPIAuthKeyWebhookAuthSettings;
use HubspotSDK\Automation\AutomationAPISignatureWebhookAuthSettings;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

final class AuthSettings implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
     */
    public static function variants(): array
    {
        return [
            AutomationAPIAuthKeyWebhookAuthSettings::class,
            AutomationAPISignatureWebhookAuthSettings::class,
        ];
    }
}
