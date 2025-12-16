<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks\Subscriptions;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Webhooks\SubscriptionBatchUpdateRequest;

/**
 * Batch create event subscriptions for the specified app.
 *
 * @see HubspotSDK\Services\Webhooks\SubscriptionsService::updateBatch()
 *
 * @phpstan-import-type SubscriptionBatchUpdateRequestShape from \HubspotSDK\Webhooks\SubscriptionBatchUpdateRequest
 *
 * @phpstan-type SubscriptionUpdateBatchParamsShape = array{
 *   inputs: list<SubscriptionBatchUpdateRequestShape>
 * }
 */
final class SubscriptionUpdateBatchParams implements BaseModel
{
    /** @use SdkModel<SubscriptionUpdateBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<SubscriptionBatchUpdateRequest> $inputs */
    #[Required(list: SubscriptionBatchUpdateRequest::class)]
    public array $inputs;

    /**
     * `new SubscriptionUpdateBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriptionUpdateBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriptionUpdateBatchParams)->withInputs(...)
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
