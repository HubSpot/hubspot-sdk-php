<?php

declare(strict_types=1);

namespace HubSpotSDK\CommunicationPreferences;

use HubSpotSDK\CommunicationPreferences\PublicStatus\Channel;
use HubSpotSDK\CommunicationPreferences\PublicStatus\LegalBasis;
use HubSpotSDK\CommunicationPreferences\PublicStatus\SetStatusSuccessReason;
use HubSpotSDK\CommunicationPreferences\PublicStatus\Status;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicStatusShape = array{
 *   channel: Channel|value-of<Channel>,
 *   source: string,
 *   status: Status|value-of<Status>,
 *   subscriberIDString: string,
 *   subscriptionID: int,
 *   timestamp: \DateTimeInterface,
 *   businessUnitID?: int|null,
 *   legalBasis?: null|LegalBasis|value-of<LegalBasis>,
 *   legalBasisExplanation?: string|null,
 *   setStatusSuccessReason?: null|SetStatusSuccessReason|value-of<SetStatusSuccessReason>,
 *   subscriptionName?: string|null,
 * }
 */
final class PublicStatus implements BaseModel
{
    /** @use SdkModel<PublicStatusShape> */
    use SdkModel;

    /**
     * The type of communication channel, with 'EMAIL' as the only supported option.
     *
     * @var value-of<Channel> $channel
     */
    #[Required(enum: Channel::class)]
    public string $channel;

    /**
     * The origin or method through which the subscription status was set.
     */
    #[Required]
    public string $source;

    /**
     * The current subscription status of the contact, which can be 'SUBSCRIBED', 'UNSUBSCRIBED', or 'NOT_SPECIFIED'.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * The contact's email address.
     */
    #[Required('subscriberIdString')]
    public string $subscriberIDString;

    /**
     * The unique identifier of the subscription.
     */
    #[Required('subscriptionId')]
    public int $subscriptionID;

    /**
     * The date and time when the subscription status was last updated.
     */
    #[Required]
    public \DateTimeInterface $timestamp;

    /**
     * The ID of the business unit associated with the subscription.
     */
    #[Optional('businessUnitId')]
    public ?int $businessUnitID;

    /**
     * The legal basis for communication, with options including 'LEGITIMATE_INTEREST_PQL', 'LEGITIMATE_INTEREST_CLIENT', 'PERFORMANCE_OF_CONTRACT', 'CONSENT_WITH_NOTICE', 'NON_GDPR', 'PROCESS_AND_STORE', and 'LEGITIMATE_INTEREST_OTHER'.
     *
     * @var value-of<LegalBasis>|null $legalBasis
     */
    #[Optional(enum: LegalBasis::class)]
    public ?string $legalBasis;

    /**
     * An explanation for the legal basis used for communication.
     */
    #[Optional]
    public ?string $legalBasisExplanation;

    /**
     * The reason for the successful change in subscription status, such as 'RESUBSCRIBE_OCCURRED' or 'NO_STATUS_CHANGE'.
     *
     * @var value-of<SetStatusSuccessReason>|null $setStatusSuccessReason
     */
    #[Optional(enum: SetStatusSuccessReason::class)]
    public ?string $setStatusSuccessReason;

    /**
     * The name of the subscription.
     */
    #[Optional]
    public ?string $subscriptionName;

    /**
     * `new PublicStatus()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicStatus::with(
     *   channel: ...,
     *   source: ...,
     *   status: ...,
     *   subscriberIDString: ...,
     *   subscriptionID: ...,
     *   timestamp: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicStatus)
     *   ->withChannel(...)
     *   ->withSource(...)
     *   ->withStatus(...)
     *   ->withSubscriberIDString(...)
     *   ->withSubscriptionID(...)
     *   ->withTimestamp(...)
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
     * @param Status|value-of<Status> $status
     * @param LegalBasis|value-of<LegalBasis>|null $legalBasis
     * @param SetStatusSuccessReason|value-of<SetStatusSuccessReason>|null $setStatusSuccessReason
     */
    public static function with(
        Channel|string $channel,
        string $source,
        Status|string $status,
        string $subscriberIDString,
        int $subscriptionID,
        \DateTimeInterface $timestamp,
        ?int $businessUnitID = null,
        LegalBasis|string|null $legalBasis = null,
        ?string $legalBasisExplanation = null,
        SetStatusSuccessReason|string|null $setStatusSuccessReason = null,
        ?string $subscriptionName = null,
    ): self {
        $self = new self;

        $self['channel'] = $channel;
        $self['source'] = $source;
        $self['status'] = $status;
        $self['subscriberIDString'] = $subscriberIDString;
        $self['subscriptionID'] = $subscriptionID;
        $self['timestamp'] = $timestamp;

        null !== $businessUnitID && $self['businessUnitID'] = $businessUnitID;
        null !== $legalBasis && $self['legalBasis'] = $legalBasis;
        null !== $legalBasisExplanation && $self['legalBasisExplanation'] = $legalBasisExplanation;
        null !== $setStatusSuccessReason && $self['setStatusSuccessReason'] = $setStatusSuccessReason;
        null !== $subscriptionName && $self['subscriptionName'] = $subscriptionName;

        return $self;
    }

    /**
     * The type of communication channel, with 'EMAIL' as the only supported option.
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
     * The origin or method through which the subscription status was set.
     */
    public function withSource(string $source): self
    {
        $self = clone $this;
        $self['source'] = $source;

        return $self;
    }

    /**
     * The current subscription status of the contact, which can be 'SUBSCRIBED', 'UNSUBSCRIBED', or 'NOT_SPECIFIED'.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

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
     * The unique identifier of the subscription.
     */
    public function withSubscriptionID(int $subscriptionID): self
    {
        $self = clone $this;
        $self['subscriptionID'] = $subscriptionID;

        return $self;
    }

    /**
     * The date and time when the subscription status was last updated.
     */
    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }

    /**
     * The ID of the business unit associated with the subscription.
     */
    public function withBusinessUnitID(int $businessUnitID): self
    {
        $self = clone $this;
        $self['businessUnitID'] = $businessUnitID;

        return $self;
    }

    /**
     * The legal basis for communication, with options including 'LEGITIMATE_INTEREST_PQL', 'LEGITIMATE_INTEREST_CLIENT', 'PERFORMANCE_OF_CONTRACT', 'CONSENT_WITH_NOTICE', 'NON_GDPR', 'PROCESS_AND_STORE', and 'LEGITIMATE_INTEREST_OTHER'.
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
     * An explanation for the legal basis used for communication.
     */
    public function withLegalBasisExplanation(
        string $legalBasisExplanation
    ): self {
        $self = clone $this;
        $self['legalBasisExplanation'] = $legalBasisExplanation;

        return $self;
    }

    /**
     * The reason for the successful change in subscription status, such as 'RESUBSCRIBE_OCCURRED' or 'NO_STATUS_CHANGE'.
     *
     * @param SetStatusSuccessReason|value-of<SetStatusSuccessReason> $setStatusSuccessReason
     */
    public function withSetStatusSuccessReason(
        SetStatusSuccessReason|string $setStatusSuccessReason
    ): self {
        $self = clone $this;
        $self['setStatusSuccessReason'] = $setStatusSuccessReason;

        return $self;
    }

    /**
     * The name of the subscription.
     */
    public function withSubscriptionName(string $subscriptionName): self
    {
        $self = clone $this;
        $self['subscriptionName'] = $subscriptionName;

        return $self;
    }
}
