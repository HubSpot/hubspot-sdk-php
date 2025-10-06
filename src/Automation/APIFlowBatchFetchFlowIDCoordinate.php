<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\APIFlowBatchFetchFlowIDCoordinate\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type api_flow_batch_fetch_flow_id_coordinate = array{
 *   flowID: string, type: value-of<Type>
 * }
 */
final class APIFlowBatchFetchFlowIDCoordinate implements BaseModel
{
    /** @use SdkModel<api_flow_batch_fetch_flow_id_coordinate> */
    use SdkModel;

    #[Api('flowId')]
    public string $flowID;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new APIFlowBatchFetchFlowIDCoordinate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIFlowBatchFetchFlowIDCoordinate::with(flowID: ..., type: ...)
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
        string $flowID,
        Type|string $type = 'FLOW_ID'
    ): self {
        $obj = new self;

        $obj->flowID = $flowID;
        $obj['type'] = $type;

        return $obj;
    }

    public function withFlowID(string $flowID): self
    {
        $obj = clone $this;
        $obj->flowID = $flowID;

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
