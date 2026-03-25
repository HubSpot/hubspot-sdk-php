<?php

declare(strict_types=1);

namespace HubspotSDK\CommunicationPreferences;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicSubscriptionStatusShape from \HubspotSDK\CommunicationPreferences\PublicSubscriptionStatus
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
     * The email address of the recipient for whom the subscription statuses are being retrieved. It is a string.
     */
    #[Required]
    public string $recipient;

    /**
     * An array of PublicSubscriptionStatus objects, each detailing the subscription status of the recipient for a particular subscription.
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
     * The email address of the recipient for whom the subscription statuses are being retrieved. It is a string.
     */
    public function withRecipient(string $recipient): self
    {
        $self = clone $this;
        $self['recipient'] = $recipient;

        return $self;
    }

    /**
     * An array of PublicSubscriptionStatus objects, each detailing the subscription status of the recipient for a particular subscription.
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
