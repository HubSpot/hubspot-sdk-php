<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V3;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type subscriptions_v3_public_subscription_statuses_response = array{
 *   recipient: string,
 *   subscriptionStatuses: list<SubscriptionsV3PublicSubscriptionStatus>,
 * }
 */
final class SubscriptionsV3PublicSubscriptionStatusesResponse implements BaseModel
{
    /** @use SdkModel<subscriptions_v3_public_subscription_statuses_response> */
    use SdkModel;

    #[Api]
    public string $recipient;

    /** @var list<SubscriptionsV3PublicSubscriptionStatus> $subscriptionStatuses */
    #[Api(list: SubscriptionsV3PublicSubscriptionStatus::class)]
    public array $subscriptionStatuses;

    /**
     * `new SubscriptionsV3PublicSubscriptionStatusesResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriptionsV3PublicSubscriptionStatusesResponse::with(
     *   recipient: ..., subscriptionStatuses: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriptionsV3PublicSubscriptionStatusesResponse)
     *   ->withRecipient(...)
     *   ->withSubscriptionStatuses(...)
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
     * @param list<SubscriptionsV3PublicSubscriptionStatus> $subscriptionStatuses
     */
    public static function with(
        string $recipient,
        array $subscriptionStatuses
    ): self {
        $obj = new self;

        $obj->recipient = $recipient;
        $obj->subscriptionStatuses = $subscriptionStatuses;

        return $obj;
    }

    public function withRecipient(string $recipient): self
    {
        $obj = clone $this;
        $obj->recipient = $recipient;

        return $obj;
    }

    /**
     * @param list<SubscriptionsV3PublicSubscriptionStatus> $subscriptionStatuses
     */
    public function withSubscriptionStatuses(array $subscriptionStatuses): self
    {
        $obj = clone $this;
        $obj->subscriptionStatuses = $subscriptionStatuses;

        return $obj;
    }
}
