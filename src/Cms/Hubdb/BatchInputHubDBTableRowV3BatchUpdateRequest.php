<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type HubDBTableRowV3BatchUpdateRequestShape from \HubspotSDK\Cms\Hubdb\HubDBTableRowV3BatchUpdateRequest
 *
 * @phpstan-type BatchInputHubDBTableRowV3BatchUpdateRequestShape = array{
 *   inputs: list<HubDBTableRowV3BatchUpdateRequestShape>
 * }
 */
final class BatchInputHubDBTableRowV3BatchUpdateRequest implements BaseModel
{
    /** @use SdkModel<BatchInputHubDBTableRowV3BatchUpdateRequestShape> */
    use SdkModel;

    /** @var list<HubDBTableRowV3BatchUpdateRequest> $inputs */
    #[Required(list: HubDBTableRowV3BatchUpdateRequest::class)]
    public array $inputs;

    /**
     * `new BatchInputHubDBTableRowV3BatchUpdateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputHubDBTableRowV3BatchUpdateRequest::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputHubDBTableRowV3BatchUpdateRequest)->withInputs(...)
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
     * @param list<HubDBTableRowV3BatchUpdateRequestShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<HubDBTableRowV3BatchUpdateRequestShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
