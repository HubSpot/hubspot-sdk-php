<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type public_subscription_statuses_response = array{
 *   recipient: string, subscriptionStatuses: list<PublicSubscriptionStatus>
 * }
 */
final class PublicSubscriptionStatusesResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<public_subscription_statuses_response> */
    use SdkModel;

    use SdkResponse;

    /**
     * Email address of the contact.
     */
    #[Api]
    public string $recipient;

    /**
     * A list of all of the contact's subscriptions statuses.
     *
     * @var list<PublicSubscriptionStatus> $subscriptionStatuses
     */
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

    /**
     * Email address of the contact.
     */
    public function withRecipient(string $recipient): self
    {
        $obj = clone $this;
        $obj->recipient = $recipient;

        return $obj;
    }

    /**
     * A list of all of the contact's subscriptions statuses.
     *
     * @param list<PublicSubscriptionStatus> $subscriptionStatuses
     */
    public function withSubscriptionStatuses(array $subscriptionStatuses): self
    {
        $obj = clone $this;
        $obj->subscriptionStatuses = $subscriptionStatuses;

        return $obj;
    }
}
