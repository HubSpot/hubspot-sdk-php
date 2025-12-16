<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SubscriptionBatchUpdateRequestShape from \HubspotSDK\Webhooks\SubscriptionBatchUpdateRequest
 *
 * @phpstan-type BatchInputSubscriptionBatchUpdateRequestShape = array{
 *   inputs: list<SubscriptionBatchUpdateRequestShape>
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
     * @param list<SubscriptionBatchUpdateRequestShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<SubscriptionBatchUpdateRequestShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
