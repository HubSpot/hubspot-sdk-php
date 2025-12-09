<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BatchInputHubDBTableRowV3RequestShape = array{
 *   inputs: list<HubDBTableRowV3Request>
 * }
 */
final class BatchInputHubDBTableRowV3Request implements BaseModel
{
    /** @use SdkModel<BatchInputHubDBTableRowV3RequestShape> */
    use SdkModel;

    /** @var list<HubDBTableRowV3Request> $inputs */
    #[Required(list: HubDBTableRowV3Request::class)]
    public array $inputs;

    /**
     * `new BatchInputHubDBTableRowV3Request()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputHubDBTableRowV3Request::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputHubDBTableRowV3Request)->withInputs(...)
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
     * @param list<HubDBTableRowV3Request|array{
     *   childTableId: int,
     *   displayIndex: int,
     *   values: array<string,Variant>,
     *   name?: string|null,
     *   path?: string|null,
     * }> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj['inputs'] = $inputs;

        return $obj;
    }

    /**
     * @param list<HubDBTableRowV3Request|array{
     *   childTableId: int,
     *   displayIndex: int,
     *   values: array<string,Variant>,
     *   name?: string|null,
     *   path?: string|null,
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }
}
