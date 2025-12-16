<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIFlowBatchFetchFlowIDCoordinate\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIFlowBatchFetchFlowIDCoordinateShape = array{
 *   flowID: string, type: Type|value-of<Type>
 * }
 */
final class APIFlowBatchFetchFlowIDCoordinate implements BaseModel
{
    /** @use SdkModel<APIFlowBatchFetchFlowIDCoordinateShape> */
    use SdkModel;

    #[Required('flowId')]
    public string $flowID;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
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
        $self = new self;

        $self['flowID'] = $flowID;
        $self['type'] = $type;

        return $self;
    }

    public function withFlowID(string $flowID): self
    {
        $self = clone $this;
        $self['flowID'] = $flowID;

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
