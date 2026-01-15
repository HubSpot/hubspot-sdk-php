<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type APIFlowBatchFetchFlowIDCoordinateShape from \HubspotSDK\Automation\Workflows\APIFlowBatchFetchFlowIDCoordinate
 *
 * @phpstan-type APIFlowBatchInputShape = array{
 *   inputs: list<APIFlowBatchFetchFlowIDCoordinate|APIFlowBatchFetchFlowIDCoordinateShape>,
 * }
 */
final class APIFlowBatchInput implements BaseModel
{
    /** @use SdkModel<APIFlowBatchInputShape> */
    use SdkModel;

    /** @var list<APIFlowBatchFetchFlowIDCoordinate> $inputs */
    #[Required(list: APIFlowBatchFetchFlowIDCoordinate::class)]
    public array $inputs;

    /**
     * `new APIFlowBatchInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIFlowBatchInput::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIFlowBatchInput)->withInputs(...)
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
     * @param list<APIFlowBatchFetchFlowIDCoordinate|APIFlowBatchFetchFlowIDCoordinateShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<APIFlowBatchFetchFlowIDCoordinate|APIFlowBatchFetchFlowIDCoordinateShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
