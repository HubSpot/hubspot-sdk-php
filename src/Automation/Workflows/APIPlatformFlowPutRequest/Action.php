<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIPlatformFlowPutRequest;

use HubspotSDK\Automation\Workflows\APIAbTestBranchAction;
use HubspotSDK\Automation\Workflows\APICustomCodeAction;
use HubspotSDK\Automation\Workflows\APIListBranchAction;
use HubspotSDK\Automation\Workflows\APISingleConnectionAction;
use HubspotSDK\Automation\Workflows\APIStaticBranchAction;
use HubspotSDK\Automation\Workflows\APIWebhookAction;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

final class Action implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
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
