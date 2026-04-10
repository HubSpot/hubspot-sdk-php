<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Hubdb;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type HubDBTableRowV3RequestShape from \HubSpotSDK\Cms\Hubdb\HubDBTableRowV3Request
 *
 * @phpstan-type BatchInputHubDBTableRowV3RequestShape = array{
 *   inputs: list<HubDBTableRowV3Request|HubDBTableRowV3RequestShape>
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
     * @param list<HubDBTableRowV3Request|HubDBTableRowV3RequestShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<HubDBTableRowV3Request|HubDBTableRowV3RequestShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
