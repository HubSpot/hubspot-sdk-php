<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
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
 *   brandingMetadata?: ExternalBrandingMetadata|null,
 *   linkAvailability?: ExternalLinkAvailability|null,
 * }
 */
final class ExternalBookingInfo implements BaseModel
{
    /** @use SdkModel<ExternalBookingInfoShape> */
    use SdkModel;

    /** @var list<ExternalUserBusyTimes> $allUsersBusyTimes */
    #[Required(list: ExternalUserBusyTimes::class)]
    public array $allUsersBusyTimes;

    #[Required]
    public ExternalMeetingsLinkSettings $customParams;

    #[Required]
    public bool $isOffline;

    #[Required('linkId')]
    public string $linkID;

    /** @var value-of<LinkType> $linkType */
    #[Required(enum: LinkType::class)]
    public string $linkType;

    #[Optional]
    public ?ExternalBrandingMetadata $brandingMetadata;

    #[Optional]
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
     *   redirectURL?: string|null,
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
     *   logoURL?: string|null,
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
        string $linkID,
        LinkType|string $linkType,
        ExternalBrandingMetadata|array|null $brandingMetadata = null,
        ExternalLinkAvailability|array|null $linkAvailability = null,
    ): self {
        $self = new self;

        $self['allUsersBusyTimes'] = $allUsersBusyTimes;
        $self['customParams'] = $customParams;
        $self['isOffline'] = $isOffline;
        $self['linkID'] = $linkID;
        $self['linkType'] = $linkType;

        null !== $brandingMetadata && $self['brandingMetadata'] = $brandingMetadata;
        null !== $linkAvailability && $self['linkAvailability'] = $linkAvailability;

        return $self;
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
        $self = clone $this;
        $self['allUsersBusyTimes'] = $allUsersBusyTimes;

        return $self;
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
     *   redirectURL?: string|null,
     *   welcomeScreenInfo?: ExternalMeetingsWelcomeScreenInfo|null,
     * } $customParams
     */
    public function withCustomParams(
        ExternalMeetingsLinkSettings|array $customParams
    ): self {
        $self = clone $this;
        $self['customParams'] = $customParams;

        return $self;
    }

    public function withIsOffline(bool $isOffline): self
    {
        $self = clone $this;
        $self['isOffline'] = $isOffline;

        return $self;
    }

    public function withLinkID(string $linkID): self
    {
        $self = clone $this;
        $self['linkID'] = $linkID;

        return $self;
    }

    /**
     * @param LinkType|value-of<LinkType> $linkType
     */
    public function withLinkType(LinkType|string $linkType): self
    {
        $self = clone $this;
        $self['linkType'] = $linkType;

        return $self;
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
     *   logoURL?: string|null,
     *   logoWidth?: int|null,
     *   primaryColor?: string|null,
     *   secondaryColor?: string|null,
     * } $brandingMetadata
     */
    public function withBrandingMetadata(
        ExternalBrandingMetadata|array $brandingMetadata
    ): self {
        $self = clone $this;
        $self['brandingMetadata'] = $brandingMetadata;

        return $self;
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
        $self = clone $this;
        $self['linkAvailability'] = $linkAvailability;

        return $self;
    }
}
