<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationAPIFlowBatchFetchMigrationFlowIDCoordinate\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_flow_batch_fetch_migration_flow_id_coordinate = array{
 *   flowMigrationStatuses: string, type: value-of<Type>
 * }
 */
final class AutomationAPIFlowBatchFetchMigrationFlowIDCoordinate implements BaseModel
{
    /**
     * @use SdkModel<automation_api_flow_batch_fetch_migration_flow_id_coordinate>
     */
    use SdkModel;

    #[Api]
    public string $flowMigrationStatuses;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new AutomationAPIFlowBatchFetchMigrationFlowIDCoordinate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPIFlowBatchFetchMigrationFlowIDCoordinate::with(
     *   flowMigrationStatuses: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPIFlowBatchFetchMigrationFlowIDCoordinate)
     *   ->withFlowMigrationStatuses(...)
     *   ->withType(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $flowMigrationStatuses,
        Type|string $type = 'FLOW_ID'
    ): self {
        $obj = new self;

        $obj->flowMigrationStatuses = $flowMigrationStatuses;
        $obj['type'] = $type;

        return $obj;
    }

    public function withFlowMigrationStatuses(
        string $flowMigrationStatuses
    ): self {
        $obj = clone $this;
        $obj->flowMigrationStatuses = $flowMigrationStatuses;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
