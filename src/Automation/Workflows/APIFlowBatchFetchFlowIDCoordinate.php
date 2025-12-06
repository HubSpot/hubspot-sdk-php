<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIFlowBatchFetchFlowIDCoordinate\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIFlowBatchFetchFlowIDCoordinateShape = array{
 *   flowId: string, type: value-of<Type>
 * }
 */
final class APIFlowBatchFetchFlowIDCoordinate implements BaseModel
{
    /** @use SdkModel<APIFlowBatchFetchFlowIDCoordinateShape> */
    use SdkModel;

    #[Api]
    public string $flowId;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new APIFlowBatchFetchFlowIDCoordinate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIFlowBatchFetchFlowIDCoordinate::with(flowId: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIFlowBatchFetchFlowIDCoordinate)->withFlowID(...)->withType(...)
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
        string $flowId,
        Type|string $type = 'FLOW_ID'
    ): self {
        $obj = new self;

        $obj['flowId'] = $flowId;
        $obj['type'] = $type;

        return $obj;
    }

    public function withFlowID(string $flowID): self
    {
        $obj = clone $this;
        $obj['flowId'] = $flowID;

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
