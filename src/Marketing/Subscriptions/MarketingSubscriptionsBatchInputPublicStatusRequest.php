<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type marketing_subscriptions_batch_input_public_status_request = array{
 *   inputs: list<MarketingSubscriptionsPublicStatusRequest>
 * }
 */
final class MarketingSubscriptionsBatchInputPublicStatusRequest implements BaseModel
{
    /** @use SdkModel<marketing_subscriptions_batch_input_public_status_request> */
    use SdkModel;

    /** @var list<MarketingSubscriptionsPublicStatusRequest> $inputs */
    #[Api(list: MarketingSubscriptionsPublicStatusRequest::class)]
    public array $inputs;

    /**
     * `new MarketingSubscriptionsBatchInputPublicStatusRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingSubscriptionsBatchInputPublicStatusRequest::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingSubscriptionsBatchInputPublicStatusRequest)->withInputs(...)
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
     * @param list<MarketingSubscriptionsPublicStatusRequest> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<MarketingSubscriptionsPublicStatusRequest> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
