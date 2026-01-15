<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\WorkflowBatchGetIDMappingsParams;

use HubspotSDK\Automation\Workflows\APIFlowBatchFetchMigrationFlowIDCoordinate;
use HubspotSDK\Automation\Workflows\APIFlowBatchFetchMigrationWorkflowIDCoordinate;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type APIFlowBatchFetchMigrationFlowIDCoordinateShape from \HubspotSDK\Automation\Workflows\APIFlowBatchFetchMigrationFlowIDCoordinate
 * @phpstan-import-type APIFlowBatchFetchMigrationWorkflowIDCoordinateShape from \HubspotSDK\Automation\Workflows\APIFlowBatchFetchMigrationWorkflowIDCoordinate
 *
 * @phpstan-type InputVariants = APIFlowBatchFetchMigrationFlowIDCoordinate|APIFlowBatchFetchMigrationWorkflowIDCoordinate
 * @phpstan-type InputShape = InputVariants|APIFlowBatchFetchMigrationFlowIDCoordinateShape|APIFlowBatchFetchMigrationWorkflowIDCoordinateShape
 */
final class Input implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            APIFlowBatchFetchMigrationFlowIDCoordinate::class,
            APIFlowBatchFetchMigrationWorkflowIDCoordinate::class,
        ];
    }
}
