<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Scheduler\Meetings\ExternalMeetingsLinkSettings\StartTimeIncrementMinutes;

/**
 * @phpstan-import-type ExternalClosedRangeShape from \HubspotSDK\Scheduler\Meetings\ExternalClosedRange
 * @phpstan-import-type ExternalLinkFormFieldShape from \HubspotSDK\Scheduler\Meetings\ExternalLinkFormField
 * @phpstan-import-type ExternalLinkDisplayInfoShape from \HubspotSDK\Scheduler\Meetings\ExternalLinkDisplayInfo
 * @phpstan-import-type ExternalGuestSettingsShape from \HubspotSDK\Scheduler\Meetings\ExternalGuestSettings
 * @phpstan-import-type ExternalLegalConsentOptionsShape from \HubspotSDK\Scheduler\Meetings\ExternalLegalConsentOptions
 * @phpstan-import-type ExternalMeetingsWelcomeScreenInfoShape from \HubspotSDK\Scheduler\Meetings\ExternalMeetingsWelcomeScreenInfo
 *
 * @phpstan-type ExternalMeetingsLinkSettingsShape = array{
 *   availability: array<string,ExternalClosedRange|ExternalClosedRangeShape>,
 *   durations: list<int>,
 *   formFields: list<ExternalLinkFormField|ExternalLinkFormFieldShape>,
 *   legalConsentEnabled: bool,
 *   meetingBufferTime: int,
 *   ownerPrioritized: bool,
 *   startTimeIncrementMinutes: StartTimeIncrementMinutes|value-of<StartTimeIncrementMinutes>,
 *   weeksToAdvertise: int,
 *   customAvailabilityEndDate?: int|null,
 *   customAvailabilityStartDate?: int|null,
 *   displayInfo?: null|ExternalLinkDisplayInfo|ExternalLinkDisplayInfoShape,
 *   guestSettings?: null|ExternalGuestSettings|ExternalGuestSettingsShape,
 *   language?: string|null,
 *   legalConsentOptions?: null|ExternalLegalConsentOptions|ExternalLegalConsentOptionsShape,
 *   locale?: string|null,
 *   location?: string|null,
 *   redirectURL?: string|null,
 *   welcomeScreenInfo?: null|ExternalMeetingsWelcomeScreenInfo|ExternalMeetingsWelcomeScreenInfoShape,
 * }
 */
final class ExternalMeetingsLinkSettings implements BaseModel
{
    /** @use SdkModel<ExternalMeetingsLinkSettingsShape> */
    use SdkModel;

    /**
     * An array containing the closed range availability for a meeting link. Closed range times are provided as minute offsets from midnight (e.g., 540 corresponds to 9am).
     *
     * @var array<string,ExternalClosedRange> $availability
     */
    #[Required(map: ExternalClosedRange::class)]
    public array $availability;

    /** @var list<int> $durations */
    #[Required(list: 'int')]
    public array $durations;

    /** @var list<ExternalLinkFormField> $formFields */
    #[Required(list: ExternalLinkFormField::class)]
    public array $formFields;

    /**
     * Whether the legal consent checkbox is displayed during meeting booking.
     */
    #[Required]
    public bool $legalConsentEnabled;

    /**
     * The minimum buffer time in milliseconds between consecutive meetings.
     */
    #[Required]
    public int $meetingBufferTime;

    /**
     * Indicates whether the meeting owner is prioritized during booking. Only applies to link types of ROUND_ROBIN.
     */
    #[Required]
    public bool $ownerPrioritized;

    /**
     * The increment for available start times of meetings, spelt out as a word (e.g. 15 minute increment corresponds to `FIFTEEN`). `MEETING_DURATION` is also a valid value.
     *
     * @var value-of<StartTimeIncrementMinutes> $startTimeIncrementMinutes
     */
    #[Required(enum: StartTimeIncrementMinutes::class)]
    public string $startTimeIncrementMinutes;

    /**
     * Legacy property that indicates the number of weeks in advance that availability is advertised. May be outdated or superseded by other properties.
     */
    #[Required]
    public int $weeksToAdvertise;

    /**
     * The end date for a meeting link's custom availability window, represented as Unix time in milliseconds.
     */
    #[Optional]
    public ?int $customAvailabilityEndDate;

    /**
     * The start date for a meeting link's custom availability window, represented as Unix time in milliseconds.
     */
    #[Optional]
    public ?int $customAvailabilityStartDate;

    #[Optional]
    public ?ExternalLinkDisplayInfo $displayInfo;

    #[Optional]
    public ?ExternalGuestSettings $guestSettings;

    /**
     * The language setting used for the meeting link.
     */
    #[Optional]
    public ?string $language;

    #[Optional]
    public ?ExternalLegalConsentOptions $legalConsentOptions;

    /**
     * The locale setting used for formatting dates and times in the meeting link.
     */
    #[Optional]
    public ?string $locale;

    /**
     * The physical or virtual location where the meeting will take place.
     */
    #[Optional]
    public ?string $location;

    /**
     * The URL to redirect to after a meeting is booked.
     */
    #[Optional('redirectUrl')]
    public ?string $redirectURL;

    #[Optional]
    public ?ExternalMeetingsWelcomeScreenInfo $welcomeScreenInfo;

    /**
     * `new ExternalMeetingsLinkSettings()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalMeetingsLinkSettings::with(
     *   availability: ...,
     *   durations: ...,
     *   formFields: ...,
     *   legalConsentEnabled: ...,
     *   meetingBufferTime: ...,
     *   ownerPrioritized: ...,
     *   startTimeIncrementMinutes: ...,
     *   weeksToAdvertise: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalMeetingsLinkSettings)
     *   ->withAvailability(...)
     *   ->withDurations(...)
     *   ->withFormFields(...)
     *   ->withLegalConsentEnabled(...)
     *   ->withMeetingBufferTime(...)
     *   ->withOwnerPrioritized(...)
     *   ->withStartTimeIncrementMinutes(...)
     *   ->withWeeksToAdvertise(...)
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
     * @param array<string,ExternalClosedRange|ExternalClosedRangeShape> $availability
     * @param list<int> $durations
     * @param list<ExternalLinkFormField|ExternalLinkFormFieldShape> $formFields
     * @param StartTimeIncrementMinutes|value-of<StartTimeIncrementMinutes> $startTimeIncrementMinutes
     * @param ExternalLinkDisplayInfo|ExternalLinkDisplayInfoShape|null $displayInfo
     * @param ExternalGuestSettings|ExternalGuestSettingsShape|null $guestSettings
     * @param ExternalLegalConsentOptions|ExternalLegalConsentOptionsShape|null $legalConsentOptions
     * @param ExternalMeetingsWelcomeScreenInfo|ExternalMeetingsWelcomeScreenInfoShape|null $welcomeScreenInfo
     */
    public static function with(
        array $availability,
        array $durations,
        array $formFields,
        bool $legalConsentEnabled,
        int $meetingBufferTime,
        bool $ownerPrioritized,
        StartTimeIncrementMinutes|string $startTimeIncrementMinutes,
        int $weeksToAdvertise,
        ?int $customAvailabilityEndDate = null,
        ?int $customAvailabilityStartDate = null,
        ExternalLinkDisplayInfo|array|null $displayInfo = null,
        ExternalGuestSettings|array|null $guestSettings = null,
        ?string $language = null,
        ExternalLegalConsentOptions|array|null $legalConsentOptions = null,
        ?string $locale = null,
        ?string $location = null,
        ?string $redirectURL = null,
        ExternalMeetingsWelcomeScreenInfo|array|null $welcomeScreenInfo = null,
    ): self {
        $self = new self;

        $self['availability'] = $availability;
        $self['durations'] = $durations;
        $self['formFields'] = $formFields;
        $self['legalConsentEnabled'] = $legalConsentEnabled;
        $self['meetingBufferTime'] = $meetingBufferTime;
        $self['ownerPrioritized'] = $ownerPrioritized;
        $self['startTimeIncrementMinutes'] = $startTimeIncrementMinutes;
        $self['weeksToAdvertise'] = $weeksToAdvertise;

        null !== $customAvailabilityEndDate && $self['customAvailabilityEndDate'] = $customAvailabilityEndDate;
        null !== $customAvailabilityStartDate && $self['customAvailabilityStartDate'] = $customAvailabilityStartDate;
        null !== $displayInfo && $self['displayInfo'] = $displayInfo;
        null !== $guestSettings && $self['guestSettings'] = $guestSettings;
        null !== $language && $self['language'] = $language;
        null !== $legalConsentOptions && $self['legalConsentOptions'] = $legalConsentOptions;
        null !== $locale && $self['locale'] = $locale;
        null !== $location && $self['location'] = $location;
        null !== $redirectURL && $self['redirectURL'] = $redirectURL;
        null !== $welcomeScreenInfo && $self['welcomeScreenInfo'] = $welcomeScreenInfo;

        return $self;
    }

    /**
     * An array containing the closed range availability for a meeting link. Closed range times are provided as minute offsets from midnight (e.g., 540 corresponds to 9am).
     *
     * @param array<string,ExternalClosedRange|ExternalClosedRangeShape> $availability
     */
    public function withAvailability(array $availability): self
    {
        $self = clone $this;
        $self['availability'] = $availability;

        return $self;
    }

    /**
     * @param list<int> $durations
     */
    public function withDurations(array $durations): self
    {
        $self = clone $this;
        $self['durations'] = $durations;

        return $self;
    }

    /**
     * @param list<ExternalLinkFormField|ExternalLinkFormFieldShape> $formFields
     */
    public function withFormFields(array $formFields): self
    {
        $self = clone $this;
        $self['formFields'] = $formFields;

        return $self;
    }

    /**
     * Whether the legal consent checkbox is displayed during meeting booking.
     */
    public function withLegalConsentEnabled(bool $legalConsentEnabled): self
    {
        $self = clone $this;
        $self['legalConsentEnabled'] = $legalConsentEnabled;

        return $self;
    }

    /**
     * The minimum buffer time in milliseconds between consecutive meetings.
     */
    public function withMeetingBufferTime(int $meetingBufferTime): self
    {
        $self = clone $this;
        $self['meetingBufferTime'] = $meetingBufferTime;

        return $self;
    }

    /**
     * Indicates whether the meeting owner is prioritized during booking. Only applies to link types of ROUND_ROBIN.
     */
    public function withOwnerPrioritized(bool $ownerPrioritized): self
    {
        $self = clone $this;
        $self['ownerPrioritized'] = $ownerPrioritized;

        return $self;
    }

    /**
     * The increment for available start times of meetings, spelt out as a word (e.g. 15 minute increment corresponds to `FIFTEEN`). `MEETING_DURATION` is also a valid value.
     *
     * @param StartTimeIncrementMinutes|value-of<StartTimeIncrementMinutes> $startTimeIncrementMinutes
     */
    public function withStartTimeIncrementMinutes(
        StartTimeIncrementMinutes|string $startTimeIncrementMinutes
    ): self {
        $self = clone $this;
        $self['startTimeIncrementMinutes'] = $startTimeIncrementMinutes;

        return $self;
    }

    /**
     * Legacy property that indicates the number of weeks in advance that availability is advertised. May be outdated or superseded by other properties.
     */
    public function withWeeksToAdvertise(int $weeksToAdvertise): self
    {
        $self = clone $this;
        $self['weeksToAdvertise'] = $weeksToAdvertise;

        return $self;
    }

    /**
     * The end date for a meeting link's custom availability window, represented as Unix time in milliseconds.
     */
    public function withCustomAvailabilityEndDate(
        int $customAvailabilityEndDate
    ): self {
        $self = clone $this;
        $self['customAvailabilityEndDate'] = $customAvailabilityEndDate;

        return $self;
    }

    /**
     * The start date for a meeting link's custom availability window, represented as Unix time in milliseconds.
     */
    public function withCustomAvailabilityStartDate(
        int $customAvailabilityStartDate
    ): self {
        $self = clone $this;
        $self['customAvailabilityStartDate'] = $customAvailabilityStartDate;

        return $self;
    }

    /**
     * @param ExternalLinkDisplayInfo|ExternalLinkDisplayInfoShape $displayInfo
     */
    public function withDisplayInfo(
        ExternalLinkDisplayInfo|array $displayInfo
    ): self {
        $self = clone $this;
        $self['displayInfo'] = $displayInfo;

        return $self;
    }

    /**
     * @param ExternalGuestSettings|ExternalGuestSettingsShape $guestSettings
     */
    public function withGuestSettings(
        ExternalGuestSettings|array $guestSettings
    ): self {
        $self = clone $this;
        $self['guestSettings'] = $guestSettings;

        return $self;
    }

    /**
     * The language setting used for the meeting link.
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * @param ExternalLegalConsentOptions|ExternalLegalConsentOptionsShape $legalConsentOptions
     */
    public function withLegalConsentOptions(
        ExternalLegalConsentOptions|array $legalConsentOptions
    ): self {
        $self = clone $this;
        $self['legalConsentOptions'] = $legalConsentOptions;

        return $self;
    }

    /**
     * The locale setting used for formatting dates and times in the meeting link.
     */
    public function withLocale(string $locale): self
    {
        $self = clone $this;
        $self['locale'] = $locale;

        return $self;
    }

    /**
     * The physical or virtual location where the meeting will take place.
     */
    public function withLocation(string $location): self
    {
        $self = clone $this;
        $self['location'] = $location;

        return $self;
    }

    /**
     * The URL to redirect to after a meeting is booked.
     */
    public function withRedirectURL(string $redirectURL): self
    {
        $self = clone $this;
        $self['redirectURL'] = $redirectURL;

        return $self;
    }

    /**
     * @param ExternalMeetingsWelcomeScreenInfo|ExternalMeetingsWelcomeScreenInfoShape $welcomeScreenInfo
     */
    public function withWelcomeScreenInfo(
        ExternalMeetingsWelcomeScreenInfo|array $welcomeScreenInfo
    ): self {
        $self = clone $this;
        $self['welcomeScreenInfo'] = $welcomeScreenInfo;

        return $self;
    }
}
