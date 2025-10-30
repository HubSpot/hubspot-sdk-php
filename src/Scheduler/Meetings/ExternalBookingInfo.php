<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Scheduler\Meetings\ExternalBookingInfo\LinkType;

/**
 * @phpstan-type ExternalBookingInfoShape = array{
 *   allUsersBusyTimes: list<ExternalUserBusyTimes>,
 *   customParams: ExternalMeetingsLinkSettings,
 *   isOffline: bool,
 *   linkID: string,
 *   linkType: value-of<LinkType>,
 *   brandingMetadata?: ExternalBrandingMetadata,
 *   linkAvailability?: ExternalLinkAvailability,
 * }
 */
final class ExternalBookingInfo implements BaseModel
{
    /** @use SdkModel<ExternalBookingInfoShape> */
    use SdkModel;

    /** @var list<ExternalUserBusyTimes> $allUsersBusyTimes */
    #[Api(list: ExternalUserBusyTimes::class)]
    public array $allUsersBusyTimes;

    #[Api]
    public ExternalMeetingsLinkSettings $customParams;

    #[Api]
    public bool $isOffline;

    #[Api('linkId')]
    public string $linkID;

    /** @var value-of<LinkType> $linkType */
    #[Api(enum: LinkType::class)]
    public string $linkType;

    #[Api(optional: true)]
    public ?ExternalBrandingMetadata $brandingMetadata;

    #[Api(optional: true)]
    public ?ExternalLinkAvailability $linkAvailability;

    /**
     * `new ExternalBookingInfo()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalBookingInfo::with(
     *   allUsersBusyTimes: ...,
     *   customParams: ...,
     *   isOffline: ...,
     *   linkID: ...,
     *   linkType: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalBookingInfo)
     *   ->withAllUsersBusyTimes(...)
     *   ->withCustomParams(...)
     *   ->withIsOffline(...)
     *   ->withLinkID(...)
     *   ->withLinkType(...)
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
     * @param list<ExternalUserBusyTimes> $allUsersBusyTimes
     * @param LinkType|value-of<LinkType> $linkType
     */
    public static function with(
        array $allUsersBusyTimes,
        ExternalMeetingsLinkSettings $customParams,
        bool $isOffline,
        string $linkID,
        LinkType|string $linkType,
        ?ExternalBrandingMetadata $brandingMetadata = null,
        ?ExternalLinkAvailability $linkAvailability = null,
    ): self {
        $obj = new self;

        $obj->allUsersBusyTimes = $allUsersBusyTimes;
        $obj->customParams = $customParams;
        $obj->isOffline = $isOffline;
        $obj->linkID = $linkID;
        $obj['linkType'] = $linkType;

        null !== $brandingMetadata && $obj->brandingMetadata = $brandingMetadata;
        null !== $linkAvailability && $obj->linkAvailability = $linkAvailability;

        return $obj;
    }

    /**
     * @param list<ExternalUserBusyTimes> $allUsersBusyTimes
     */
    public function withAllUsersBusyTimes(array $allUsersBusyTimes): self
    {
        $obj = clone $this;
        $obj->allUsersBusyTimes = $allUsersBusyTimes;

        return $obj;
    }

    public function withCustomParams(
        ExternalMeetingsLinkSettings $customParams
    ): self {
        $obj = clone $this;
        $obj->customParams = $customParams;

        return $obj;
    }

    public function withIsOffline(bool $isOffline): self
    {
        $obj = clone $this;
        $obj->isOffline = $isOffline;

        return $obj;
    }

    public function withLinkID(string $linkID): self
    {
        $obj = clone $this;
        $obj->linkID = $linkID;

        return $obj;
    }

    /**
     * @param LinkType|value-of<LinkType> $linkType
     */
    public function withLinkType(LinkType|string $linkType): self
    {
        $obj = clone $this;
        $obj['linkType'] = $linkType;

        return $obj;
    }

    public function withBrandingMetadata(
        ExternalBrandingMetadata $brandingMetadata
    ): self {
        $obj = clone $this;
        $obj->brandingMetadata = $brandingMetadata;

        return $obj;
    }

    public function withLinkAvailability(
        ExternalLinkAvailability $linkAvailability
    ): self {
        $obj = clone $this;
        $obj->linkAvailability = $linkAvailability;

        return $obj;
    }
}
