<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\PublicWideStatus\Channel;
use HubspotSDK\Marketing\Subscriptions\PublicWideStatus\Status;
use HubspotSDK\Marketing\Subscriptions\PublicWideStatus\WideStatusType;

/**
 * @phpstan-type public_wide_status = array{
 *   channel: value-of<Channel>,
 *   status: value-of<Status>,
 *   subscriberIDString: string,
 *   timestamp: \DateTimeInterface,
 *   wideStatusType: value-of<WideStatusType>,
 *   businessUnitID?: int,
 * }
 */
final class PublicWideStatus implements BaseModel
{
    /** @use SdkModel<public_wide_status> */
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
        $obj = new self;

        $obj['channel'] = $channel;
        $obj['status'] = $status;
        $obj->subscriberIDString = $subscriberIDString;
        $obj->timestamp = $timestamp;
        $obj['wideStatusType'] = $wideStatusType;

        null !== $businessUnitID && $obj->businessUnitID = $businessUnitID;

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
        $obj['wideStatusType'] = $wideStatusType;

        return $obj;
    }

    public function withBusinessUnitID(int $businessUnitID): self
    {
        $obj = clone $this;
        $obj->businessUnitID = $businessUnitID;

        return $obj;
    }
}
