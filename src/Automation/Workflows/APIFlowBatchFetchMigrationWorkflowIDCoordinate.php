<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIFlowBatchFetchMigrationWorkflowIDCoordinate\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIFlowBatchFetchMigrationWorkflowIDCoordinateShape = array{
 *   flowMigrationStatusForClassicWorkflows: string, type: value-of<Type>
 * }
 */
final class APIFlowBatchFetchMigrationWorkflowIDCoordinate implements BaseModel
{
    /** @use SdkModel<APIFlowBatchFetchMigrationWorkflowIDCoordinateShape> */
    use SdkModel;

    #[Api]
    public string $flowMigrationStatusForClassicWorkflows;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new APIFlowBatchFetchMigrationWorkflowIDCoordinate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIFlowBatchFetchMigrationWorkflowIDCoordinate::with(
     *   flowMigrationStatusForClassicWorkflows: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIFlowBatchFetchMigrationWorkflowIDCoordinate)
     *   ->withFlowMigrationStatusForClassicWorkflows(...)
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
        string $flowMigrationStatusForClassicWorkflows,
        Type|string $type = 'WORKFLOW_ID',
    ): self {
        $obj = new self;

        $obj->flowMigrationStatusForClassicWorkflows = $flowMigrationStatusForClassicWorkflows;
        $obj['type'] = $type;

        return $obj;
    }

    public function withFlowMigrationStatusForClassicWorkflows(
        string $flowMigrationStatusForClassicWorkflows
    ): self {
        $obj = clone $this;
        $obj->flowMigrationStatusForClassicWorkflows = $flowMigrationStatusForClassicWorkflows;

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
