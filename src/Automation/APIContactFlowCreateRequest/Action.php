<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\APIContactFlowCreateRequest;

use HubspotSDK\Automation\APIAbTestBranchAction;
use HubspotSDK\Automation\APICustomCodeAction;
use HubspotSDK\Automation\APIListBranchAction;
use HubspotSDK\Automation\APISingleConnectionAction;
use HubspotSDK\Automation\APIStaticBranchAction;
use HubspotSDK\Automation\APIWebhookAction;
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
            APIStaticBranchAction::class,
            APIListBranchAction::class,
            APIAbTestBranchAction::class,
            APICustomCodeAction::class,
            APIWebhookAction::class,
            APISingleConnectionAction::class,
        ];
    }
}
