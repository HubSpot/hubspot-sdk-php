<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\V4\PublicWideStatus\Channel;
use HubspotSDK\Marketing\Subscriptions\V4\PublicWideStatus\Status;
use HubspotSDK\Marketing\Subscriptions\V4\PublicWideStatus\WideStatusType;

/**
 * @phpstan-type PublicWideStatusShape = array{
 *   channel: value-of<Channel>,
 *   status: value-of<Status>,
 *   subscriberIDString: string,
 *   timestamp: \DateTimeInterface,
 *   wideStatusType: value-of<WideStatusType>,
 *   businessUnitID?: int|null,
 * }
 */
final class PublicWideStatus implements BaseModel
{
    /** @use SdkModel<PublicWideStatusShape> */
    use SdkModel;

    /**
     * The type of communication channel, with 'EMAIL' as the only supported option.
     *
     * @var value-of<Channel> $channel
     */
    #[Required(enum: Channel::class)]
    public string $channel;

    /**
     * The subscription status of the contact, which can be 'SUBSCRIBED', 'UNSUBSCRIBED', or 'NOT_SPECIFIED'.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * The email address of the contact.
     */
    #[Required('subscriberIdString')]
    public string $subscriberIDString;

    /**
     * The date and time when the status was recorded.
     */
    #[Required]
    public \DateTimeInterface $timestamp;

    /**
     * The type of wide status, which can be 'PORTAL_WIDE' or 'BUSINESS_UNIT_WIDE'.
     *
     * @var value-of<WideStatusType> $wideStatusType
     */
    #[Required(enum: WideStatusType::class)]
    public string $wideStatusType;

    /**
     * The ID of the business unit associated with the status.
     */
    #[Optional('businessUnitId')]
    public ?int $businessUnitID;

    /**
     * `new PublicWideStatus()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicWideStatus::with(
     *   channel: ...,
     *   status: ...,
     *   subscriberIDString: ...,
     *   timestamp: ...,
     *   wideStatusType: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicWideStatus)
     *   ->withChannel(...)
     *   ->withStatus(...)
     *   ->withSubscriberIDString(...)
     *   ->withTimestamp(...)
     *   ->withWideStatusType(...)
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
     * @param WideStatusType|value-of<WideStatusType> $wideStatusType
     */
    public static function with(
        Channel|string $channel,
        Status|string $status,
        string $subscriberIDString,
        \DateTimeInterface $timestamp,
        WideStatusType|string $wideStatusType,
        ?int $businessUnitID = null,
    ): self {
        $self = new self;

        $self['channel'] = $channel;
        $self['status'] = $status;
        $self['subscriberIDString'] = $subscriberIDString;
        $self['timestamp'] = $timestamp;
        $self['wideStatusType'] = $wideStatusType;

        null !== $businessUnitID && $self['businessUnitID'] = $businessUnitID;

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
     * The subscription status of the contact, which can be 'SUBSCRIBED', 'UNSUBSCRIBED', or 'NOT_SPECIFIED'.
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
     * The email address of the contact.
     */
    public function withSubscriberIDString(string $subscriberIDString): self
    {
        $self = clone $this;
        $self['subscriberIDString'] = $subscriberIDString;

        return $self;
    }

    /**
     * The date and time when the status was recorded.
     */
    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }

    /**
     * The type of wide status, which can be 'PORTAL_WIDE' or 'BUSINESS_UNIT_WIDE'.
     *
     * @param WideStatusType|value-of<WideStatusType> $wideStatusType
     */
    public function withWideStatusType(
        WideStatusType|string $wideStatusType
    ): self {
        $self = clone $this;
        $self['wideStatusType'] = $wideStatusType;

        return $self;
    }

    /**
     * The ID of the business unit associated with the status.
     */
    public function withBusinessUnitID(int $businessUnitID): self
    {
        $self = clone $this;
        $self['businessUnitID'] = $businessUnitID;

        return $self;
    }
}
