<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BatchInputHubDBTableRowBatchCloneRequestShape = array{
 *   inputs: list<HubDBTableRowBatchCloneRequest>
 * }
 */
final class BatchInputHubDBTableRowBatchCloneRequest implements BaseModel
{
    /** @use SdkModel<BatchInputHubDBTableRowBatchCloneRequestShape> */
    use SdkModel;

    /** @var list<HubDBTableRowBatchCloneRequest> $inputs */
    #[Api(list: HubDBTableRowBatchCloneRequest::class)]
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
     * @param list<HubDBTableRowBatchCloneRequest|array{
     *   id: string, name?: string|null
     * }> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj['inputs'] = $inputs;

        return $obj;
    }

    /**
     * @param list<HubDBTableRowBatchCloneRequest|array{
     *   id: string, name?: string|null
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }
}
