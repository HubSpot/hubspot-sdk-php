<?php

declare(strict_types=1);

namespace HubspotSDK\AppWebhooks;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\AppWebhooksService::batchUpdateSubscriptions()
 *
 * @phpstan-import-type SubscriptionBatchUpdateRequestShape from \HubspotSDK\AppWebhooks\SubscriptionBatchUpdateRequest
 *
 * @phpstan-type AppWebhookBatchUpdateSubscriptionsParamsShape = array{
 *   inputs: list<SubscriptionBatchUpdateRequest|SubscriptionBatchUpdateRequestShape>,
 * }
 */
final class AppWebhookBatchUpdateSubscriptionsParams implements BaseModel
{
    /** @use SdkModel<AppWebhookBatchUpdateSubscriptionsParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<SubscriptionBatchUpdateRequest> $inputs */
    #[Required(list: SubscriptionBatchUpdateRequest::class)]
    public array $inputs;

    /**
     * `new AppWebhookBatchUpdateSubscriptionsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AppWebhookBatchUpdateSubscriptionsParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AppWebhookBatchUpdateSubscriptionsParams)->withInputs(...)
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
