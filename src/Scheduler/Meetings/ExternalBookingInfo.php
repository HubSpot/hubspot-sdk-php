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
 *   linkId: string,
 *   linkType: value-of<LinkType>,
 *   brandingMetadata?: ExternalBrandingMetadata|null,
 *   linkAvailability?: ExternalLinkAvailability|null,
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

    #[Api]
    public string $linkId;

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
     *   linkId: ...,
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
     * @param list<ExternalUserBusyTimes|array{
     *   busyTimes: list<ExternalTimeRange>,
     *   isOffline: bool,
     *   meetingsUser: ExternalMeetingsUser,
     * }> $allUsersBusyTimes
     * @param ExternalMeetingsLinkSettings|array{
     *   availability: array<string,ExternalClosedRange>,
     *   durations: list<int>,
     *   formFields: list<ExternalLinkFormField>,
     *   legalConsentEnabled: bool,
     *   meetingBufferTime: int,
     *   ownerPrioritized: bool,
     *   startTimeIncrementMinutes: string,
     *   weeksToAdvertise: int,
     *   customAvailabilityEndDate?: int|null,
     *   customAvailabilityStartDate?: int|null,
     *   displayInfo?: ExternalLinkDisplayInfo|null,
     *   guestSettings?: ExternalGuestSettings|null,
     *   language?: string|null,
     *   legalConsentOptions?: ExternalLegalConsentOptions|null,
     *   locale?: string|null,
     *   location?: string|null,
     *   redirectUrl?: string|null,
     *   welcomeScreenInfo?: ExternalMeetingsWelcomeScreenInfo|null,
     * } $customParams
     * @param LinkType|value-of<LinkType> $linkType
     * @param ExternalBrandingMetadata|array{
     *   logoAltText: string,
     *   showMarketingAd: bool,
     *   showSalesAd: bool,
     *   accent2Color?: string|null,
     *   accentColor?: string|null,
     *   companyAddressLine1?: string|null,
     *   companyAddressLine2?: string|null,
     *   companyAvatar?: string|null,
     *   companyCity?: string|null,
     *   companyCountry?: string|null,
     *   companyDomain?: string|null,
     *   companyName?: string|null,
     *   companyState?: string|null,
     *   companyZip?: string|null,
     *   logoHeight?: int|null,
     *   logoUrl?: string|null,
     *   logoWidth?: int|null,
     *   primaryColor?: string|null,
     *   secondaryColor?: string|null,
     * } $brandingMetadata
     * @param ExternalLinkAvailability|array{
     *   hasMore: bool,
     *   linkAvailabilityByDuration: array<string,ExternalLinkAvailabilityForDuration>,
     * } $linkAvailability
     */
    public static function with(
        array $allUsersBusyTimes,
        ExternalMeetingsLinkSettings|array $customParams,
        bool $isOffline,
        string $linkId,
        LinkType|string $linkType,
        ExternalBrandingMetadata|array|null $brandingMetadata = null,
        ExternalLinkAvailability|array|null $linkAvailability = null,
    ): self {
        $obj = new self;

        $obj['allUsersBusyTimes'] = $allUsersBusyTimes;
        $obj['customParams'] = $customParams;
        $obj['isOffline'] = $isOffline;
        $obj['linkId'] = $linkId;
        $obj['linkType'] = $linkType;

        null !== $brandingMetadata && $obj['brandingMetadata'] = $brandingMetadata;
        null !== $linkAvailability && $obj['linkAvailability'] = $linkAvailability;

        return $obj;
    }

    /**
     * @param list<ExternalUserBusyTimes|array{
     *   busyTimes: list<ExternalTimeRange>,
     *   isOffline: bool,
     *   meetingsUser: ExternalMeetingsUser,
     * }> $allUsersBusyTimes
     */
    public function withAllUsersBusyTimes(array $allUsersBusyTimes): self
    {
        $obj = clone $this;
        $obj['allUsersBusyTimes'] = $allUsersBusyTimes;

        return $obj;
    }

    /**
     * @param ExternalMeetingsLinkSettings|array{
     *   availability: array<string,ExternalClosedRange>,
     *   durations: list<int>,
     *   formFields: list<ExternalLinkFormField>,
     *   legalConsentEnabled: bool,
     *   meetingBufferTime: int,
     *   ownerPrioritized: bool,
     *   startTimeIncrementMinutes: string,
     *   weeksToAdvertise: int,
     *   customAvailabilityEndDate?: int|null,
     *   customAvailabilityStartDate?: int|null,
     *   displayInfo?: ExternalLinkDisplayInfo|null,
     *   guestSettings?: ExternalGuestSettings|null,
     *   language?: string|null,
     *   legalConsentOptions?: ExternalLegalConsentOptions|null,
     *   locale?: string|null,
     *   location?: string|null,
     *   redirectUrl?: string|null,
     *   welcomeScreenInfo?: ExternalMeetingsWelcomeScreenInfo|null,
     * } $customParams
     */
    public function withCustomParams(
        ExternalMeetingsLinkSettings|array $customParams
    ): self {
        $obj = clone $this;
        $obj['customParams'] = $customParams;

        return $obj;
    }

    public function withIsOffline(bool $isOffline): self
    {
        $obj = clone $this;
        $obj['isOffline'] = $isOffline;

        return $obj;
    }

    public function withLinkID(string $linkID): self
    {
        $obj = clone $this;
        $obj['linkId'] = $linkID;

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

    /**
     * @param ExternalBrandingMetadata|array{
     *   logoAltText: string,
     *   showMarketingAd: bool,
     *   showSalesAd: bool,
     *   accent2Color?: string|null,
     *   accentColor?: string|null,
     *   companyAddressLine1?: string|null,
     *   companyAddressLine2?: string|null,
     *   companyAvatar?: string|null,
     *   companyCity?: string|null,
     *   companyCountry?: string|null,
     *   companyDomain?: string|null,
     *   companyName?: string|null,
     *   companyState?: string|null,
     *   companyZip?: string|null,
     *   logoHeight?: int|null,
     *   logoUrl?: string|null,
     *   logoWidth?: int|null,
     *   primaryColor?: string|null,
     *   secondaryColor?: string|null,
     * } $brandingMetadata
     */
    public function withBrandingMetadata(
        ExternalBrandingMetadata|array $brandingMetadata
    ): self {
        $obj = clone $this;
        $obj['brandingMetadata'] = $brandingMetadata;

        return $obj;
    }

    /**
     * @param ExternalLinkAvailability|array{
     *   hasMore: bool,
     *   linkAvailabilityByDuration: array<string,ExternalLinkAvailabilityForDuration>,
     * } $linkAvailability
     */
    public function withLinkAvailability(
        ExternalLinkAvailability|array $linkAvailability
    ): self {
        $obj = clone $this;
        $obj['linkAvailability'] = $linkAvailability;

        return $obj;
    }
}
