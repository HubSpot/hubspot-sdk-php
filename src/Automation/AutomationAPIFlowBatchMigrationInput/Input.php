<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\AutomationAPIFlowBatchMigrationInput;

use HubspotSDK\Automation\AutomationAPIFlowBatchFetchMigrationFlowIDCoordinate;
use HubspotSDK\Automation\AutomationAPIFlowBatchFetchMigrationWorkflowIDCoordinate;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

final class Input implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
     */
    public static function variants(): array
    {
        return [
            AutomationAPIFlowBatchFetchMigrationFlowIDCoordinate::class,
            AutomationAPIFlowBatchFetchMigrationWorkflowIDCoordinate::class,
        ];
    }
}
