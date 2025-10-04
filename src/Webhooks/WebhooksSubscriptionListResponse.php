<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type webhooks_subscription_list_response = array{
 *   results: list<WebhooksSubscriptionResponse>
 * }
 */
final class WebhooksSubscriptionListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<webhooks_subscription_list_response> */
    use SdkModel;

    use SdkResponse;

    /** @var list<WebhooksSubscriptionResponse> $results */
    #[Api(list: WebhooksSubscriptionResponse::class)]
    public array $results;

    /**
     * `new WebhooksSubscriptionListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhooksSubscriptionListResponse::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhooksSubscriptionListResponse)->withResults(...)
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
     * @param list<WebhooksSubscriptionResponse> $results
     */
    public static function with(array $results): self
    {
        $obj = new self;

        $obj->results = $results;

        return $obj;
    }

    /**
     * @param list<WebhooksSubscriptionResponse> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }
}
