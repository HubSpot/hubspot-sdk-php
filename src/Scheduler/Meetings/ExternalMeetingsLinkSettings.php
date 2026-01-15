<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

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
 *   startTimeIncrementMinutes: string,
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

    /** @var array<string,ExternalClosedRange> $availability */
    #[Required(map: ExternalClosedRange::class)]
    public array $availability;

    /** @var list<int> $durations */
    #[Required(list: 'int')]
    public array $durations;

    /** @var list<ExternalLinkFormField> $formFields */
    #[Required(list: ExternalLinkFormField::class)]
    public array $formFields;

    #[Required]
    public bool $legalConsentEnabled;

    #[Required]
    public int $meetingBufferTime;

    #[Required]
    public bool $ownerPrioritized;

    #[Required]
    public string $startTimeIncrementMinutes;

    #[Required]
    public int $weeksToAdvertise;

    #[Optional]
    public ?int $customAvailabilityEndDate;

    #[Optional]
    public ?int $customAvailabilityStartDate;

    #[Optional]
    public ?ExternalLinkDisplayInfo $displayInfo;

    #[Optional]
    public ?ExternalGuestSettings $guestSettings;

    #[Optional]
    public ?string $language;

    #[Optional]
    public ?ExternalLegalConsentOptions $legalConsentOptions;

    #[Optional]
    public ?string $locale;

    #[Optional]
    public ?string $location;

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
        string $startTimeIncrementMinutes,
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

    public function withLegalConsentEnabled(bool $legalConsentEnabled): self
    {
        $self = clone $this;
        $self['legalConsentEnabled'] = $legalConsentEnabled;

        return $self;
    }

    public function withMeetingBufferTime(int $meetingBufferTime): self
    {
        $self = clone $this;
        $self['meetingBufferTime'] = $meetingBufferTime;

        return $self;
    }

    public function withOwnerPrioritized(bool $ownerPrioritized): self
    {
        $self = clone $this;
        $self['ownerPrioritized'] = $ownerPrioritized;

        return $self;
    }

    public function withStartTimeIncrementMinutes(
        string $startTimeIncrementMinutes
    ): self {
        $self = clone $this;
        $self['startTimeIncrementMinutes'] = $startTimeIncrementMinutes;

        return $self;
    }

    public function withWeeksToAdvertise(int $weeksToAdvertise): self
    {
        $self = clone $this;
        $self['weeksToAdvertise'] = $weeksToAdvertise;

        return $self;
    }

    public function withCustomAvailabilityEndDate(
        int $customAvailabilityEndDate
    ): self {
        $self = clone $this;
        $self['customAvailabilityEndDate'] = $customAvailabilityEndDate;

        return $self;
    }

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

    public function withLocale(string $locale): self
    {
        $self = clone $this;
        $self['locale'] = $locale;

        return $self;
    }

    public function withLocation(string $location): self
    {
        $self = clone $this;
        $self['location'] = $location;

        return $self;
    }

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
