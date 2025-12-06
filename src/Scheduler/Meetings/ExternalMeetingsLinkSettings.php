<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Scheduler\Meetings\ExternalLegalConsentOptions\LegitimateInterestLegalBasis;

/**
 * @phpstan-type ExternalMeetingsLinkSettingsShape = array{
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
 * }
 */
final class ExternalMeetingsLinkSettings implements BaseModel
{
    /** @use SdkModel<ExternalMeetingsLinkSettingsShape> */
    use SdkModel;

    /** @var array<string,ExternalClosedRange> $availability */
    #[Api(map: ExternalClosedRange::class)]
    public array $availability;

    /** @var list<int> $durations */
    #[Api(list: 'int')]
    public array $durations;

    /** @var list<ExternalLinkFormField> $formFields */
    #[Api(list: ExternalLinkFormField::class)]
    public array $formFields;

    #[Api]
    public bool $legalConsentEnabled;

    #[Api]
    public int $meetingBufferTime;

    #[Api]
    public bool $ownerPrioritized;

    #[Api]
    public string $startTimeIncrementMinutes;

    #[Api]
    public int $weeksToAdvertise;

    #[Api(optional: true)]
    public ?int $customAvailabilityEndDate;

    #[Api(optional: true)]
    public ?int $customAvailabilityStartDate;

    #[Api(optional: true)]
    public ?ExternalLinkDisplayInfo $displayInfo;

    #[Api(optional: true)]
    public ?ExternalGuestSettings $guestSettings;

    #[Api(optional: true)]
    public ?string $language;

    #[Api(optional: true)]
    public ?ExternalLegalConsentOptions $legalConsentOptions;

    #[Api(optional: true)]
    public ?string $locale;

    #[Api(optional: true)]
    public ?string $location;

    #[Api(optional: true)]
    public ?string $redirectUrl;

    #[Api(optional: true)]
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
     * @param array<string,ExternalClosedRange|array{
     *   end: int, start: int
     * }> $availability
     * @param list<int> $durations
     * @param list<ExternalLinkFormField|array{
     *   fieldType: string,
     *   isCustom: bool,
     *   isRequired: bool,
     *   label: string,
     *   name: string,
     *   options: list<ExternalOption>,
     *   type: string,
     * }> $formFields
     * @param ExternalLinkDisplayInfo|array{
     *   avatar?: string|null,
     *   companyAvatar?: string|null,
     *   headline?: string|null,
     *   publicDisplayAvatarOption?: string|null,
     * } $displayInfo
     * @param ExternalGuestSettings|array{
     *   canAddGuests: bool, maxGuestCount: int
     * } $guestSettings
     * @param ExternalLegalConsentOptions|array{
     *   communicationConsentCheckboxes: list<ExternalCommunicationConsentCheckbox>,
     *   communicationConsentText: string,
     *   isLegitimateInterest: bool,
     *   legitimateInterestSubscriptionTypes: list<int>,
     *   privacyPolicyText: string,
     *   processingConsentCheckboxLabel: string,
     *   processingConsentFooterText: string,
     *   processingConsentText: string,
     *   processingConsentType: string,
     *   legitimateInterestLegalBasis?: value-of<LegitimateInterestLegalBasis>|null,
     * } $legalConsentOptions
     * @param ExternalMeetingsWelcomeScreenInfo|array{
     *   description?: string|null,
     *   logoUrl?: string|null,
     *   showWelcomeScreen?: bool|null,
     *   title?: string|null,
     *   useCompanyLogo?: bool|null,
     * } $welcomeScreenInfo
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
        ?string $redirectUrl = null,
        ExternalMeetingsWelcomeScreenInfo|array|null $welcomeScreenInfo = null,
    ): self {
        $obj = new self;

        $obj['availability'] = $availability;
        $obj['durations'] = $durations;
        $obj['formFields'] = $formFields;
        $obj['legalConsentEnabled'] = $legalConsentEnabled;
        $obj['meetingBufferTime'] = $meetingBufferTime;
        $obj['ownerPrioritized'] = $ownerPrioritized;
        $obj['startTimeIncrementMinutes'] = $startTimeIncrementMinutes;
        $obj['weeksToAdvertise'] = $weeksToAdvertise;

        null !== $customAvailabilityEndDate && $obj['customAvailabilityEndDate'] = $customAvailabilityEndDate;
        null !== $customAvailabilityStartDate && $obj['customAvailabilityStartDate'] = $customAvailabilityStartDate;
        null !== $displayInfo && $obj['displayInfo'] = $displayInfo;
        null !== $guestSettings && $obj['guestSettings'] = $guestSettings;
        null !== $language && $obj['language'] = $language;
        null !== $legalConsentOptions && $obj['legalConsentOptions'] = $legalConsentOptions;
        null !== $locale && $obj['locale'] = $locale;
        null !== $location && $obj['location'] = $location;
        null !== $redirectUrl && $obj['redirectUrl'] = $redirectUrl;
        null !== $welcomeScreenInfo && $obj['welcomeScreenInfo'] = $welcomeScreenInfo;

        return $obj;
    }

    /**
     * @param array<string,ExternalClosedRange|array{
     *   end: int, start: int
     * }> $availability
     */
    public function withAvailability(array $availability): self
    {
        $obj = clone $this;
        $obj['availability'] = $availability;

        return $obj;
    }

    /**
     * @param list<int> $durations
     */
    public function withDurations(array $durations): self
    {
        $obj = clone $this;
        $obj['durations'] = $durations;

        return $obj;
    }

    /**
     * @param list<ExternalLinkFormField|array{
     *   fieldType: string,
     *   isCustom: bool,
     *   isRequired: bool,
     *   label: string,
     *   name: string,
     *   options: list<ExternalOption>,
     *   type: string,
     * }> $formFields
     */
    public function withFormFields(array $formFields): self
    {
        $obj = clone $this;
        $obj['formFields'] = $formFields;

        return $obj;
    }

    public function withLegalConsentEnabled(bool $legalConsentEnabled): self
    {
        $obj = clone $this;
        $obj['legalConsentEnabled'] = $legalConsentEnabled;

        return $obj;
    }

    public function withMeetingBufferTime(int $meetingBufferTime): self
    {
        $obj = clone $this;
        $obj['meetingBufferTime'] = $meetingBufferTime;

        return $obj;
    }

    public function withOwnerPrioritized(bool $ownerPrioritized): self
    {
        $obj = clone $this;
        $obj['ownerPrioritized'] = $ownerPrioritized;

        return $obj;
    }

    public function withStartTimeIncrementMinutes(
        string $startTimeIncrementMinutes
    ): self {
        $obj = clone $this;
        $obj['startTimeIncrementMinutes'] = $startTimeIncrementMinutes;

        return $obj;
    }

    public function withWeeksToAdvertise(int $weeksToAdvertise): self
    {
        $obj = clone $this;
        $obj['weeksToAdvertise'] = $weeksToAdvertise;

        return $obj;
    }

    public function withCustomAvailabilityEndDate(
        int $customAvailabilityEndDate
    ): self {
        $obj = clone $this;
        $obj['customAvailabilityEndDate'] = $customAvailabilityEndDate;

        return $obj;
    }

    public function withCustomAvailabilityStartDate(
        int $customAvailabilityStartDate
    ): self {
        $obj = clone $this;
        $obj['customAvailabilityStartDate'] = $customAvailabilityStartDate;

        return $obj;
    }

    /**
     * @param ExternalLinkDisplayInfo|array{
     *   avatar?: string|null,
     *   companyAvatar?: string|null,
     *   headline?: string|null,
     *   publicDisplayAvatarOption?: string|null,
     * } $displayInfo
     */
    public function withDisplayInfo(
        ExternalLinkDisplayInfo|array $displayInfo
    ): self {
        $obj = clone $this;
        $obj['displayInfo'] = $displayInfo;

        return $obj;
    }

    /**
     * @param ExternalGuestSettings|array{
     *   canAddGuests: bool, maxGuestCount: int
     * } $guestSettings
     */
    public function withGuestSettings(
        ExternalGuestSettings|array $guestSettings
    ): self {
        $obj = clone $this;
        $obj['guestSettings'] = $guestSettings;

        return $obj;
    }

    public function withLanguage(string $language): self
    {
        $obj = clone $this;
        $obj['language'] = $language;

        return $obj;
    }

    /**
     * @param ExternalLegalConsentOptions|array{
     *   communicationConsentCheckboxes: list<ExternalCommunicationConsentCheckbox>,
     *   communicationConsentText: string,
     *   isLegitimateInterest: bool,
     *   legitimateInterestSubscriptionTypes: list<int>,
     *   privacyPolicyText: string,
     *   processingConsentCheckboxLabel: string,
     *   processingConsentFooterText: string,
     *   processingConsentText: string,
     *   processingConsentType: string,
     *   legitimateInterestLegalBasis?: value-of<LegitimateInterestLegalBasis>|null,
     * } $legalConsentOptions
     */
    public function withLegalConsentOptions(
        ExternalLegalConsentOptions|array $legalConsentOptions
    ): self {
        $obj = clone $this;
        $obj['legalConsentOptions'] = $legalConsentOptions;

        return $obj;
    }

    public function withLocale(string $locale): self
    {
        $obj = clone $this;
        $obj['locale'] = $locale;

        return $obj;
    }

    public function withLocation(string $location): self
    {
        $obj = clone $this;
        $obj['location'] = $location;

        return $obj;
    }

    public function withRedirectURL(string $redirectURL): self
    {
        $obj = clone $this;
        $obj['redirectUrl'] = $redirectURL;

        return $obj;
    }

    /**
     * @param ExternalMeetingsWelcomeScreenInfo|array{
     *   description?: string|null,
     *   logoUrl?: string|null,
     *   showWelcomeScreen?: bool|null,
     *   title?: string|null,
     *   useCompanyLogo?: bool|null,
     * } $welcomeScreenInfo
     */
    public function withWelcomeScreenInfo(
        ExternalMeetingsWelcomeScreenInfo|array $welcomeScreenInfo
    ): self {
        $obj = clone $this;
        $obj['welcomeScreenInfo'] = $welcomeScreenInfo;

        return $obj;
    }
}
