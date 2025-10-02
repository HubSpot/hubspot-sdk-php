<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\MarketingSubscriptionsPublicWideStatus\Channel;
use HubspotSDK\Marketing\Subscriptions\MarketingSubscriptionsPublicWideStatus\Status;
use HubspotSDK\Marketing\Subscriptions\MarketingSubscriptionsPublicWideStatus\WideStatusType;

/**
 * @phpstan-type marketing_subscriptions_public_wide_status = array{
 *   channel: value-of<Channel>,
 *   status: value-of<Status>,
 *   subscriberIDString: string,
 *   timestamp: \DateTimeInterface,
 *   wideStatusType: value-of<WideStatusType>,
 *   businessUnitID?: int,
 * }
 */
final class MarketingSubscriptionsPublicWideStatus implements BaseModel
{
    /** @use SdkModel<marketing_subscriptions_public_wide_status> */
    use SdkModel;

    /** @var value-of<Channel> $channel */
    #[Api(enum: Channel::class)]
    public string $channel;

    /** @var value-of<Status> $status */
    #[Api(enum: Status::class)]
    public string $status;

    #[Api('subscriberIdString')]
    public string $subscriberIDString;

    #[Api]
    public \DateTimeInterface $timestamp;

    /** @var value-of<WideStatusType> $wideStatusType */
    #[Api(enum: WideStatusType::class)]
    public string $wideStatusType;

    #[Api('businessUnitId', optional: true)]
    public ?int $businessUnitID;

    /**
     * `new MarketingSubscriptionsPublicWideStatus()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingSubscriptionsPublicWideStatus::with(
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
     * (new MarketingSubscriptionsPublicWideStatus)
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
        $obj = new self;

        $obj->channel = $channel instanceof Channel ? $channel->value : $channel;
        $obj->status = $status instanceof Status ? $status->value : $status;
        $obj->subscriberIDString = $subscriberIDString;
        $obj->timestamp = $timestamp;
        $obj->wideStatusType = $wideStatusType instanceof WideStatusType ? $wideStatusType->value : $wideStatusType;

        null !== $businessUnitID && $obj->businessUnitID = $businessUnitID;

        return $obj;
    }

    /**
     * @param Channel|value-of<Channel> $channel
     */
    public function withChannel(Channel|string $channel): self
    {
        $obj = clone $this;
        $obj->channel = $channel instanceof Channel ? $channel->value : $channel;

        return $obj;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }

    public function withSubscriberIDString(string $subscriberIDString): self
    {
        $obj = clone $this;
        $obj->subscriberIDString = $subscriberIDString;

        return $obj;
    }

    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $obj = clone $this;
        $obj->timestamp = $timestamp;

        return $obj;
    }

    /**
     * @param WideStatusType|value-of<WideStatusType> $wideStatusType
     */
    public function withWideStatusType(
        WideStatusType|string $wideStatusType
    ): self {
        $obj = clone $this;
        $obj->wideStatusType = $wideStatusType instanceof WideStatusType ? $wideStatusType->value : $wideStatusType;

        return $obj;
    }

    public function withBusinessUnitID(int $businessUnitID): self
    {
        $obj = clone $this;
        $obj->businessUnitID = $businessUnitID;

        return $obj;
    }
}
