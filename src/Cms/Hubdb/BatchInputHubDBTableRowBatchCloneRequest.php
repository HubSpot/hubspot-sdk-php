<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type HubDBTableRowBatchCloneRequestShape from \HubspotSDK\Cms\Hubdb\HubDBTableRowBatchCloneRequest
 *
 * @phpstan-type BatchInputHubDBTableRowBatchCloneRequestShape = array{
 *   inputs: list<HubDBTableRowBatchCloneRequest|HubDBTableRowBatchCloneRequestShape>,
 * }
 */
final class BatchInputHubDBTableRowBatchCloneRequest implements BaseModel
{
    /** @use SdkModel<BatchInputHubDBTableRowBatchCloneRequestShape> */
    use SdkModel;

    /** @var list<HubDBTableRowBatchCloneRequest> $inputs */
    #[Required(list: HubDBTableRowBatchCloneRequest::class)]
    public array $inputs;

    /**
     * `new BatchInputHubDBTableRowBatchCloneRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputHubDBTableRowBatchCloneRequest::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputHubDBTableRowBatchCloneRequest)->withInputs(...)
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
     * @param list<HubDBTableRowBatchCloneRequest|HubDBTableRowBatchCloneRequestShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<HubDBTableRowBatchCloneRequest|HubDBTableRowBatchCloneRequestShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
