<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks\Webhooks\Batch;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Webhooks\Webhooks\SubscriptionBatchUpdateRequest;

/**
 * Batch create event subscriptions for the specified app.
 *
 * @see HubspotSDK\Services\Webhooks\Webhooks\BatchService::updateSubscriptions()
 *
 * @phpstan-import-type SubscriptionBatchUpdateRequestShape from \HubspotSDK\Webhooks\Webhooks\SubscriptionBatchUpdateRequest
 *
 * @phpstan-type BatchUpdateSubscriptionsParamsShape = array{
 *   inputs: list<SubscriptionBatchUpdateRequest|SubscriptionBatchUpdateRequestShape>,
 * }
 */
final class BatchUpdateSubscriptionsParams implements BaseModel
{
    /** @use SdkModel<BatchUpdateSubscriptionsParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<SubscriptionBatchUpdateRequest> $inputs */
    #[Required(list: SubscriptionBatchUpdateRequest::class)]
    public array $inputs;

    /**
     * `new BatchUpdateSubscriptionsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchUpdateSubscriptionsParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchUpdateSubscriptionsParams)->withInputs(...)
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
