<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SubscriptionBatchUpdateRequestShape from \HubSpotSDK\Webhooks\SubscriptionBatchUpdateRequest
 *
 * @phpstan-type BatchInputSubscriptionBatchUpdateRequestShape = array{
 *   inputs: list<SubscriptionBatchUpdateRequest|SubscriptionBatchUpdateRequestShape>,
 * }
 */
final class BatchInputSubscriptionBatchUpdateRequest implements BaseModel
{
    /** @use SdkModel<BatchInputSubscriptionBatchUpdateRequestShape> */
    use SdkModel;

    /** @var list<SubscriptionBatchUpdateRequest> $inputs */
    #[Required(list: SubscriptionBatchUpdateRequest::class)]
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
     * @param list<SubscriptionBatchUpdateRequest|SubscriptionBatchUpdateRequestShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<SubscriptionBatchUpdateRequest|SubscriptionBatchUpdateRequestShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
