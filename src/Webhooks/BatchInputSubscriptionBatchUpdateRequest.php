<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BatchInputSubscriptionBatchUpdateRequestShape = array{
 *   inputs: list<SubscriptionBatchUpdateRequest>
 * }
 */
final class BatchInputSubscriptionBatchUpdateRequest implements BaseModel
{
    /** @use SdkModel<BatchInputSubscriptionBatchUpdateRequestShape> */
    use SdkModel;

    /** @var list<SubscriptionBatchUpdateRequest> $inputs */
    #[Api(list: SubscriptionBatchUpdateRequest::class)]
    public array $inputs;

    /**
     * `new BatchInputSubscriptionBatchUpdateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputSubscriptionBatchUpdateRequest::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputSubscriptionBatchUpdateRequest)->withInputs(...)
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
     * @param list<SubscriptionBatchUpdateRequest|array{id: int, active: bool}> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj['inputs'] = $inputs;

        return $obj;
    }

    /**
     * @param list<SubscriptionBatchUpdateRequest|array{id: int, active: bool}> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }
}
