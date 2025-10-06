<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\APIFlowBatchMigrationInput;

use HubspotSDK\Automation\APIFlowBatchFetchMigrationFlowIDCoordinate;
use HubspotSDK\Automation\APIFlowBatchFetchMigrationWorkflowIDCoordinate;
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
            APIFlowBatchFetchMigrationFlowIDCoordinate::class,
            APIFlowBatchFetchMigrationWorkflowIDCoordinate::class,
        ];
    }
}
