<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V3;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_subscription_statuses_response = array{
 *   recipient: string, subscriptionStatuses: list<PublicSubscriptionStatus>
 * }
 */
final class PublicSubscriptionStatusesResponse implements BaseModel
{
    /** @use SdkModel<public_subscription_statuses_response> */
    use SdkModel;

    #[Api]
    public string $recipient;

    /** @var list<PublicSubscriptionStatus> $subscriptionStatuses */
    #[Api(list: PublicSubscriptionStatus::class)]
    public array $subscriptionStatuses;

    /**
     * `new PublicSubscriptionStatusesResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicSubscriptionStatusesResponse::with(
     *   recipient: ..., subscriptionStatuses: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicSubscriptionStatusesResponse)
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
     * @param list<PublicSubscriptionStatus> $subscriptionStatuses
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
     * @param list<PublicSubscriptionStatus> $subscriptionStatuses
     */
    public function withSubscriptionStatuses(array $subscriptionStatuses): self
    {
        $obj = clone $this;
        $obj->subscriptionStatuses = $subscriptionStatuses;

        return $obj;
    }
}
