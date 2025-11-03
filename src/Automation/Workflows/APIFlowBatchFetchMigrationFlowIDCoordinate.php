<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIFlowBatchFetchMigrationFlowIDCoordinate\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIFlowBatchFetchMigrationFlowIDCoordinateShape = array{
 *   flowMigrationStatuses: string, type: value-of<Type>
 * }
 */
final class APIFlowBatchFetchMigrationFlowIDCoordinate implements BaseModel
{
    /** @use SdkModel<APIFlowBatchFetchMigrationFlowIDCoordinateShape> */
    use SdkModel;

    #[Api]
    public string $flowMigrationStatuses;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new APIFlowBatchFetchMigrationFlowIDCoordinate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIFlowBatchFetchMigrationFlowIDCoordinate::with(
     *   flowMigrationStatuses: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIFlowBatchFetchMigrationFlowIDCoordinate)
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
