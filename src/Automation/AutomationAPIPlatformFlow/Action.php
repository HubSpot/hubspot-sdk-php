<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\AutomationAPIPlatformFlow;

use HubspotSDK\Automation\AutomationAPIAbTestBranchAction;
use HubspotSDK\Automation\AutomationAPICustomCodeAction;
use HubspotSDK\Automation\AutomationAPIListBranchAction;
use HubspotSDK\Automation\AutomationAPISingleConnectionAction;
use HubspotSDK\Automation\AutomationAPIStaticBranchAction;
use HubspotSDK\Automation\AutomationAPIWebhookAction;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

final class Action implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
     */
    public static function variants(): array
    {
        return [
            AutomationAPIStaticBranchAction::class,
            AutomationAPIListBranchAction::class,
            AutomationAPIAbTestBranchAction::class,
            AutomationAPICustomCodeAction::class,
            AutomationAPIWebhookAction::class,
            AutomationAPISingleConnectionAction::class,
        ];
    }
}
