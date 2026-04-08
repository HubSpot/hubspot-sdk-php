<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Batch create event subscriptions for the specified app.
 *
 * @see HubspotSDK\Services\WebhooksService::createSubscriptionsBatch()
 *
 * @phpstan-import-type SubscriptionBatchUpdateRequestShape from \HubspotSDK\Webhooks\SubscriptionBatchUpdateRequest
 *
 * @phpstan-type WebhookCreateSubscriptionsBatchParamsShape = array{
 *   inputs: list<SubscriptionBatchUpdateRequest|SubscriptionBatchUpdateRequestShape>,
 * }
 */
final class WebhookCreateSubscriptionsBatchParams implements BaseModel
{
    /** @use SdkModel<WebhookCreateSubscriptionsBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<SubscriptionBatchUpdateRequest> $inputs */
    #[Required(list: SubscriptionBatchUpdateRequest::class)]
    public array $inputs;

    /**
     * `new WebhookCreateSubscriptionsBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookCreateSubscriptionsBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookCreateSubscriptionsBatchParams)->withInputs(...)
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
