<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type webhooks_batch_input_subscription_batch_update_request = array{
 *   inputs: list<WebhooksSubscriptionBatchUpdateRequest>
 * }
 */
final class WebhooksBatchInputSubscriptionBatchUpdateRequest implements BaseModel
{
    /** @use SdkModel<webhooks_batch_input_subscription_batch_update_request> */
    use SdkModel;

    /** @var list<WebhooksSubscriptionBatchUpdateRequest> $inputs */
    #[Api(list: WebhooksSubscriptionBatchUpdateRequest::class)]
    public array $inputs;

    /**
     * `new WebhooksBatchInputSubscriptionBatchUpdateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhooksBatchInputSubscriptionBatchUpdateRequest::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhooksBatchInputSubscriptionBatchUpdateRequest)->withInputs(...)
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
     * @param list<WebhooksSubscriptionBatchUpdateRequest> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<WebhooksSubscriptionBatchUpdateRequest> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
