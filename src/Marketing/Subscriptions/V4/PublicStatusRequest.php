<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatusRequest\Channel;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatusRequest\LegalBasis;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatusRequest\StatusState;

/**
 * @phpstan-type PublicStatusRequestShape = array{
 *   channel: Channel|value-of<Channel>,
 *   statusState: StatusState|value-of<StatusState>,
 *   subscriberIDString: string,
 *   subscriptionID: int,
 *   legalBasis?: null|LegalBasis|value-of<LegalBasis>,
 *   legalBasisExplanation?: string|null,
 * }
 */
final class PublicStatusRequest implements BaseModel
{
    /** @use SdkModel<PublicStatusRequestShape> */
    use SdkModel;

    /**
     * The type of communication channel. Currently, only `EMAIL` is supported.
     *
     * @var value-of<Channel> $channel
     */
    #[Required(enum: Channel::class)]
    public string $channel;

    /**
     * The status of the contact's subscription.
     *
     * @var value-of<StatusState> $statusState
     */
    #[Required(enum: StatusState::class)]
    public string $statusState;

    /**
     * The contact's email address.
     */
    #[Required('subscriberIdString')]
    public string $subscriberIDString;

    /**
     * The ID of the subscription to update.
     */
    #[Required('subscriptionId')]
    public int $subscriptionID;

    /**
     * The legal basis for communication.
     *
     * @var value-of<LegalBasis>|null $legalBasis
     */
    #[Optional(enum: LegalBasis::class)]
    public ?string $legalBasis;

    /**
     * The explanation for the legal basis.
     */
    #[Optional]
    public ?string $legalBasisExplanation;

    /**
     * `new PublicStatusRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicStatusRequest::with(
     *   channel: ..., statusState: ..., subscriberIDString: ..., subscriptionID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicStatusRequest)
     *   ->withChannel(...)
     *   ->withStatusState(...)
     *   ->withSubscriberIDString(...)
     *   ->withSubscriptionID(...)
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
     * @param Channel|value-of<Channel> $channel
     * @param StatusState|value-of<StatusState> $statusState
     * @param LegalBasis|value-of<LegalBasis>|null $legalBasis
     */
    public static function with(
        Channel|string $channel,
        StatusState|string $statusState,
        string $subscriberIDString,
        int $subscriptionID,
        LegalBasis|string|null $legalBasis = null,
        ?string $legalBasisExplanation = null,
    ): self {
        $self = new self;

        $self['channel'] = $channel;
        $self['statusState'] = $statusState;
        $self['subscriberIDString'] = $subscriberIDString;
        $self['subscriptionID'] = $subscriptionID;

        null !== $legalBasis && $self['legalBasis'] = $legalBasis;
        null !== $legalBasisExplanation && $self['legalBasisExplanation'] = $legalBasisExplanation;

        return $self;
    }

    /**
     * The type of communication channel. Currently, only `EMAIL` is supported.
     *
     * @param Channel|value-of<Channel> $channel
     */
    public function withChannel(Channel|string $channel): self
    {
        $self = clone $this;
        $self['channel'] = $channel;

        return $self;
    }

    /**
     * The status of the contact's subscription.
     *
     * @param StatusState|value-of<StatusState> $statusState
     */
    public function withStatusState(StatusState|string $statusState): self
    {
        $self = clone $this;
        $self['statusState'] = $statusState;

        return $self;
    }

    /**
     * The contact's email address.
     */
    public function withSubscriberIDString(string $subscriberIDString): self
    {
        $self = clone $this;
        $self['subscriberIDString'] = $subscriberIDString;

        return $self;
    }

    /**
     * The ID of the subscription to update.
     */
    public function withSubscriptionID(int $subscriptionID): self
    {
        $self = clone $this;
        $self['subscriptionID'] = $subscriptionID;

        return $self;
    }

    /**
     * The legal basis for communication.
     *
     * @param LegalBasis|value-of<LegalBasis> $legalBasis
     */
    public function withLegalBasis(LegalBasis|string $legalBasis): self
    {
        $self = clone $this;
        $self['legalBasis'] = $legalBasis;

        return $self;
    }

    /**
     * The explanation for the legal basis.
     */
    public function withLegalBasisExplanation(
        string $legalBasisExplanation
    ): self {
        $self = clone $this;
        $self['legalBasisExplanation'] = $legalBasisExplanation;

        return $self;
    }
}
