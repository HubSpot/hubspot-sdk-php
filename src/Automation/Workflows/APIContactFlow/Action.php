<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIContactFlow;

use HubspotSDK\Automation\Workflows\APIAbTestBranchAction;
use HubspotSDK\Automation\Workflows\APICustomCodeAction;
use HubspotSDK\Automation\Workflows\APIListBranchAction;
use HubspotSDK\Automation\Workflows\APISingleConnectionAction;
use HubspotSDK\Automation\Workflows\APIStaticBranchAction;
use HubspotSDK\Automation\Workflows\APIWebhookAction;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type APIStaticBranchActionShape from \HubspotSDK\Automation\Workflows\APIStaticBranchAction
 * @phpstan-import-type APIListBranchActionShape from \HubspotSDK\Automation\Workflows\APIListBranchAction
 * @phpstan-import-type APIAbTestBranchActionShape from \HubspotSDK\Automation\Workflows\APIAbTestBranchAction
 * @phpstan-import-type APICustomCodeActionShape from \HubspotSDK\Automation\Workflows\APICustomCodeAction
 * @phpstan-import-type APIWebhookActionShape from \HubspotSDK\Automation\Workflows\APIWebhookAction
 * @phpstan-import-type APISingleConnectionActionShape from \HubspotSDK\Automation\Workflows\APISingleConnectionAction
 *
 * @phpstan-type ActionVariants = APIStaticBranchAction|APIListBranchAction|APIAbTestBranchAction|APICustomCodeAction|APIWebhookAction|APISingleConnectionAction
 * @phpstan-type ActionShape = ActionVariants|APIStaticBranchActionShape|APIListBranchActionShape|APIAbTestBranchActionShape|APICustomCodeActionShape|APIWebhookActionShape|APISingleConnectionActionShape
 */
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
