<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Batch create event subscriptions for the specified app.
 *
 * @see HubSpotSDK\Services\WebhooksService::createBatchEventSubscriptions()
 *
 * @phpstan-import-type SubscriptionBatchUpdateRequestShape from \HubSpotSDK\Webhooks\SubscriptionBatchUpdateRequest
 *
 * @phpstan-type WebhookCreateBatchEventSubscriptionsParamsShape = array{
 *   inputs: list<SubscriptionBatchUpdateRequest|SubscriptionBatchUpdateRequestShape>,
 * }
 */
final class WebhookCreateBatchEventSubscriptionsParams implements BaseModel
{
    /** @use SdkModel<WebhookCreateBatchEventSubscriptionsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * An array of SubscriptionBatchUpdateRequest objects, each representing a subscription to be updated. This property is required.
     *
     * @var list<SubscriptionBatchUpdateRequest> $inputs
     */
    #[Required(list: SubscriptionBatchUpdateRequest::class)]
    public array $inputs;

    /**
     * `new WebhookCreateBatchEventSubscriptionsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookCreateBatchEventSubscriptionsParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookCreateBatchEventSubscriptionsParams)->withInputs(...)
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
     * An array of SubscriptionBatchUpdateRequest objects, each representing a subscription to be updated. This property is required.
     *
     * @param list<SubscriptionBatchUpdateRequest|SubscriptionBatchUpdateRequestShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
