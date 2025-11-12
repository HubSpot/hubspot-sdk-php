<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatus\Channel;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatus\LegalBasis;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatus\SetStatusSuccessReason;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatus\Status;

/**
 * @phpstan-type PublicStatusShape = array{
 *   channel: value-of<Channel>,
 *   source: string,
 *   status: value-of<Status>,
 *   subscriberIdString: string,
 *   subscriptionId: int,
 *   timestamp: \DateTimeInterface,
 *   businessUnitId?: int|null,
 *   legalBasis?: value-of<LegalBasis>|null,
 *   legalBasisExplanation?: string|null,
 *   setStatusSuccessReason?: value-of<SetStatusSuccessReason>|null,
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
    #[Api(enum: Channel::class)]
    public string $channel;

    /**
     * The origin or method through which the subscription status was set.
     */
    #[Api]
    public string $source;

    /**
     * The current subscription status of the contact, which can be 'SUBSCRIBED', 'UNSUBSCRIBED', or 'NOT_SPECIFIED'.
     *
     * @var value-of<Status> $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    /**
     * The contact's email address.
     */
    #[Api]
    public string $subscriberIdString;

    /**
     * The unique identifier of the subscription.
     */
    #[Api]
    public int $subscriptionId;

    /**
     * The date and time when the subscription status was last updated.
     */
    #[Api]
    public \DateTimeInterface $timestamp;

    /**
     * The ID of the business unit associated with the subscription.
     */
    #[Api(optional: true)]
    public ?int $businessUnitId;

    /**
     * The legal basis for communication, with options including 'LEGITIMATE_INTEREST_PQL', 'LEGITIMATE_INTEREST_CLIENT', 'PERFORMANCE_OF_CONTRACT', 'CONSENT_WITH_NOTICE', 'NON_GDPR', 'PROCESS_AND_STORE', and 'LEGITIMATE_INTEREST_OTHER'.
     *
     * @var value-of<LegalBasis>|null $legalBasis
     */
    #[Api(enum: LegalBasis::class, optional: true)]
    public ?string $legalBasis;

    /**
     * An explanation for the legal basis used for communication.
     */
    #[Api(optional: true)]
    public ?string $legalBasisExplanation;

    /**
     * The reason for the successful change in subscription status, such as 'RESUBSCRIBE_OCCURRED' or 'NO_STATUS_CHANGE'.
     *
     * @var value-of<SetStatusSuccessReason>|null $setStatusSuccessReason
     */
    #[Api(enum: SetStatusSuccessReason::class, optional: true)]
    public ?string $setStatusSuccessReason;

    /**
     * The name of the subscription.
     */
    #[Api(optional: true)]
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
     *   subscriberIdString: ...,
     *   subscriptionId: ...,
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
     * @param LegalBasis|value-of<LegalBasis> $legalBasis
     * @param SetStatusSuccessReason|value-of<SetStatusSuccessReason> $setStatusSuccessReason
     */
    public static function with(
        Channel|string $channel,
        string $source,
        Status|string $status,
        string $subscriberIdString,
        int $subscriptionId,
        \DateTimeInterface $timestamp,
        ?int $businessUnitId = null,
        LegalBasis|string|null $legalBasis = null,
        ?string $legalBasisExplanation = null,
        SetStatusSuccessReason|string|null $setStatusSuccessReason = null,
        ?string $subscriptionName = null,
    ): self {
        $obj = new self;

        $obj['channel'] = $channel;
        $obj->source = $source;
        $obj['status'] = $status;
        $obj->subscriberIdString = $subscriberIdString;
        $obj->subscriptionId = $subscriptionId;
        $obj->timestamp = $timestamp;

        null !== $businessUnitId && $obj->businessUnitId = $businessUnitId;
        null !== $legalBasis && $obj['legalBasis'] = $legalBasis;
        null !== $legalBasisExplanation && $obj->legalBasisExplanation = $legalBasisExplanation;
        null !== $setStatusSuccessReason && $obj['setStatusSuccessReason'] = $setStatusSuccessReason;
        null !== $subscriptionName && $obj->subscriptionName = $subscriptionName;

        return $obj;
    }

    /**
     * The type of communication channel, with 'EMAIL' as the only supported option.
     *
     * @param Channel|value-of<Channel> $channel
     */
    public function withChannel(Channel|string $channel): self
    {
        $obj = clone $this;
        $obj['channel'] = $channel;

        return $obj;
    }

    /**
     * The origin or method through which the subscription status was set.
     */
    public function withSource(string $source): self
    {
        $obj = clone $this;
        $obj->source = $source;

        return $obj;
    }

    /**
     * The current subscription status of the contact, which can be 'SUBSCRIBED', 'UNSUBSCRIBED', or 'NOT_SPECIFIED'.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * The contact's email address.
     */
    public function withSubscriberIDString(string $subscriberIDString): self
    {
        $obj = clone $this;
        $obj->subscriberIdString = $subscriberIDString;

        return $obj;
    }

    /**
     * The unique identifier of the subscription.
     */
    public function withSubscriptionID(int $subscriptionID): self
    {
        $obj = clone $this;
        $obj->subscriptionId = $subscriptionID;

        return $obj;
    }

    /**
     * The date and time when the subscription status was last updated.
     */
    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $obj = clone $this;
        $obj->timestamp = $timestamp;

        return $obj;
    }

    /**
     * The ID of the business unit associated with the subscription.
     */
    public function withBusinessUnitID(int $businessUnitID): self
    {
        $obj = clone $this;
        $obj->businessUnitId = $businessUnitID;

        return $obj;
    }

    /**
     * The legal basis for communication, with options including 'LEGITIMATE_INTEREST_PQL', 'LEGITIMATE_INTEREST_CLIENT', 'PERFORMANCE_OF_CONTRACT', 'CONSENT_WITH_NOTICE', 'NON_GDPR', 'PROCESS_AND_STORE', and 'LEGITIMATE_INTEREST_OTHER'.
     *
     * @param LegalBasis|value-of<LegalBasis> $legalBasis
     */
    public function withLegalBasis(LegalBasis|string $legalBasis): self
    {
        $obj = clone $this;
        $obj['legalBasis'] = $legalBasis;

        return $obj;
    }

    /**
     * An explanation for the legal basis used for communication.
     */
    public function withLegalBasisExplanation(
        string $legalBasisExplanation
    ): self {
        $obj = clone $this;
        $obj->legalBasisExplanation = $legalBasisExplanation;

        return $obj;
    }

    /**
     * The reason for the successful change in subscription status, such as 'RESUBSCRIBE_OCCURRED' or 'NO_STATUS_CHANGE'.
     *
     * @param SetStatusSuccessReason|value-of<SetStatusSuccessReason> $setStatusSuccessReason
     */
    public function withSetStatusSuccessReason(
        SetStatusSuccessReason|string $setStatusSuccessReason
    ): self {
        $obj = clone $this;
        $obj['setStatusSuccessReason'] = $setStatusSuccessReason;

        return $obj;
    }

    /**
     * The name of the subscription.
     */
    public function withSubscriptionName(string $subscriptionName): self
    {
        $obj = clone $this;
        $obj->subscriptionName = $subscriptionName;

        return $obj;
    }
}
