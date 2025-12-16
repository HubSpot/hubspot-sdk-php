<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIFlowBatchFetchMigrationWorkflowIDCoordinate\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIFlowBatchFetchMigrationWorkflowIDCoordinateShape = array{
 *   flowMigrationStatusForClassicWorkflows: string, type: Type|value-of<Type>
 * }
 */
final class APIFlowBatchFetchMigrationWorkflowIDCoordinate implements BaseModel
{
    /** @use SdkModel<APIFlowBatchFetchMigrationWorkflowIDCoordinateShape> */
    use SdkModel;

    #[Required]
    public string $flowMigrationStatusForClassicWorkflows;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
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
        $self = new self;

        $self['flowMigrationStatusForClassicWorkflows'] = $flowMigrationStatusForClassicWorkflows;
        $self['type'] = $type;

        return $self;
    }

    public function withFlowMigrationStatusForClassicWorkflows(
        string $flowMigrationStatusForClassicWorkflows
    ): self {
        $self = clone $this;
        $self['flowMigrationStatusForClassicWorkflows'] = $flowMigrationStatusForClassicWorkflows;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
