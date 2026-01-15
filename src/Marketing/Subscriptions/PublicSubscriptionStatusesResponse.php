<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicSubscriptionStatusShape from \HubspotSDK\Marketing\Subscriptions\PublicSubscriptionStatus
 *
 * @phpstan-type PublicSubscriptionStatusesResponseShape = array{
 *   recipient: string,
 *   subscriptionStatuses: list<PublicSubscriptionStatus|PublicSubscriptionStatusShape>,
 * }
 */
final class PublicSubscriptionStatusesResponse implements BaseModel
{
    /** @use SdkModel<PublicSubscriptionStatusesResponseShape> */
    use SdkModel;

    /**
     * Email address of the contact.
     */
    #[Required]
    public string $recipient;

    /**
     * A list of all of the contact's subscriptions statuses.
     *
     * @var list<PublicSubscriptionStatus> $subscriptionStatuses
     */
    #[Required(list: PublicSubscriptionStatus::class)]
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
     * @param list<PublicSubscriptionStatus|PublicSubscriptionStatusShape> $subscriptionStatuses
     */
    public static function with(
        string $recipient,
        array $subscriptionStatuses
    ): self {
        $self = new self;

        $self['recipient'] = $recipient;
        $self['subscriptionStatuses'] = $subscriptionStatuses;

        return $self;
    }

    /**
     * Email address of the contact.
     */
    public function withRecipient(string $recipient): self
    {
        $self = clone $this;
        $self['recipient'] = $recipient;

        return $self;
    }

    /**
     * A list of all of the contact's subscriptions statuses.
     *
     * @param list<PublicSubscriptionStatus|PublicSubscriptionStatusShape> $subscriptionStatuses
     */
    public function withSubscriptionStatuses(array $subscriptionStatuses): self
    {
        $self = clone $this;
        $self['subscriptionStatuses'] = $subscriptionStatuses;

        return $self;
    }
}
