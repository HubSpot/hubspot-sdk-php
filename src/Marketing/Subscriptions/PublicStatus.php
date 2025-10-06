<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\PublicStatus\Channel;
use HubspotSDK\Marketing\Subscriptions\PublicStatus\LegalBasis;
use HubspotSDK\Marketing\Subscriptions\PublicStatus\SetStatusSuccessReason;
use HubspotSDK\Marketing\Subscriptions\PublicStatus\Status;

/**
 * @phpstan-type public_status = array{
 *   channel: value-of<Channel>,
 *   source: string,
 *   status: value-of<Status>,
 *   subscriberIDString: string,
 *   subscriptionID: int,
 *   timestamp: \DateTimeInterface,
 *   businessUnitID?: int,
 *   legalBasis?: value-of<LegalBasis>,
 *   legalBasisExplanation?: string,
 *   setStatusSuccessReason?: value-of<SetStatusSuccessReason>,
 *   subscriptionName?: string,
 * }
 */
final class PublicStatus implements BaseModel
{
    /** @use SdkModel<public_status> */
    use SdkModel;

    /** @var value-of<Channel> $channel */
    #[Api(enum: Channel::class)]
    public string $channel;

    #[Api]
    public string $source;

    /** @var value-of<Status> $status */
    #[Api(enum: Status::class)]
    public string $status;

    #[Api('subscriberIdString')]
    public string $subscriberIDString;

    #[Api('subscriptionId')]
    public int $subscriptionID;

    #[Api]
    public \DateTimeInterface $timestamp;

    #[Api('businessUnitId', optional: true)]
    public ?int $businessUnitID;

    /** @var value-of<LegalBasis>|null $legalBasis */
    #[Api(enum: LegalBasis::class, optional: true)]
    public ?string $legalBasis;

    #[Api(optional: true)]
    public ?string $legalBasisExplanation;

    /** @var value-of<SetStatusSuccessReason>|null $setStatusSuccessReason */
    #[Api(enum: SetStatusSuccessReason::class, optional: true)]
    public ?string $setStatusSuccessReason;

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
     * @param LegalBasis|value-of<LegalBasis> $legalBasis
     * @param SetStatusSuccessReason|value-of<SetStatusSuccessReason> $setStatusSuccessReason
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
        $obj = new self;

        $obj['channel'] = $channel;
        $obj->source = $source;
        $obj['status'] = $status;
        $obj->subscriberIDString = $subscriberIDString;
        $obj->subscriptionID = $subscriptionID;
        $obj->timestamp = $timestamp;

        null !== $businessUnitID && $obj->businessUnitID = $businessUnitID;
        null !== $legalBasis && $obj['legalBasis'] = $legalBasis;
        null !== $legalBasisExplanation && $obj->legalBasisExplanation = $legalBasisExplanation;
        null !== $setStatusSuccessReason && $obj['setStatusSuccessReason'] = $setStatusSuccessReason;
        null !== $subscriptionName && $obj->subscriptionName = $subscriptionName;

        return $obj;
    }

    /**
     * @param Channel|value-of<Channel> $channel
     */
    public function withChannel(Channel|string $channel): self
    {
        $obj = clone $this;
        $obj['channel'] = $channel;

        return $obj;
    }

    public function withSource(string $source): self
    {
        $obj = clone $this;
        $obj->source = $source;

        return $obj;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    public function withSubscriberIDString(string $subscriberIDString): self
    {
        $obj = clone $this;
        $obj->subscriberIDString = $subscriberIDString;

        return $obj;
    }

    public function withSubscriptionID(int $subscriptionID): self
    {
        $obj = clone $this;
        $obj->subscriptionID = $subscriptionID;

        return $obj;
    }

    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $obj = clone $this;
        $obj->timestamp = $timestamp;

        return $obj;
    }

    public function withBusinessUnitID(int $businessUnitID): self
    {
        $obj = clone $this;
        $obj->businessUnitID = $businessUnitID;

        return $obj;
    }

    /**
     * @param LegalBasis|value-of<LegalBasis> $legalBasis
     */
    public function withLegalBasis(LegalBasis|string $legalBasis): self
    {
        $obj = clone $this;
        $obj['legalBasis'] = $legalBasis;

        return $obj;
    }

    public function withLegalBasisExplanation(
        string $legalBasisExplanation
    ): self {
        $obj = clone $this;
        $obj->legalBasisExplanation = $legalBasisExplanation;

        return $obj;
    }

    /**
     * @param SetStatusSuccessReason|value-of<SetStatusSuccessReason> $setStatusSuccessReason
     */
    public function withSetStatusSuccessReason(
        SetStatusSuccessReason|string $setStatusSuccessReason
    ): self {
        $obj = clone $this;
        $obj['setStatusSuccessReason'] = $setStatusSuccessReason;

        return $obj;
    }

    public function withSubscriptionName(string $subscriptionName): self
    {
        $obj = clone $this;
        $obj->subscriptionName = $subscriptionName;

        return $obj;
    }
}
