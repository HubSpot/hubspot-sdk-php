<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ExternalValidatedFormFieldShape from \HubspotSDK\Scheduler\Meetings\ExternalValidatedFormField
 * @phpstan-import-type ExternalLegalConsentResponseShape from \HubspotSDK\Scheduler\Meetings\ExternalLegalConsentResponse
 *
 * @phpstan-type ExternalMeetingBookingResponseShape = array{
 *   bookingTimezone: string,
 *   calendarEventID: string,
 *   contactID: string,
 *   duration: int,
 *   end: \DateTimeInterface,
 *   formFields: list<ExternalValidatedFormFieldShape>,
 *   guestEmails: list<string>,
 *   isOffline: bool,
 *   legalConsentResponses: list<ExternalLegalConsentResponseShape>,
 *   start: \DateTimeInterface,
 *   subject: string,
 *   locale?: string|null,
 *   location?: string|null,
 *   webConferenceMeetingID?: string|null,
 *   webConferenceURL?: string|null,
 * }
 */
final class ExternalMeetingBookingResponse implements BaseModel
{
    /** @use SdkModel<ExternalMeetingBookingResponseShape> */
    use SdkModel;

    #[Required]
    public string $bookingTimezone;

    #[Required('calendarEventId')]
    public string $calendarEventID;

    #[Required('contactId')]
    public string $contactID;

    #[Required]
    public int $duration;

    #[Required]
    public \DateTimeInterface $end;

    /** @var list<ExternalValidatedFormField> $formFields */
    #[Required(list: ExternalValidatedFormField::class)]
    public array $formFields;

    /** @var list<string> $guestEmails */
    #[Required(list: 'string')]
    public array $guestEmails;

    #[Required]
    public bool $isOffline;

    /** @var list<ExternalLegalConsentResponse> $legalConsentResponses */
    #[Required(list: ExternalLegalConsentResponse::class)]
    public array $legalConsentResponses;

    #[Required]
    public \DateTimeInterface $start;

    #[Required]
    public string $subject;

    #[Optional]
    public ?string $locale;

    #[Optional]
    public ?string $location;

    #[Optional('webConferenceMeetingId')]
    public ?string $webConferenceMeetingID;

    #[Optional('webConferenceUrl')]
    public ?string $webConferenceURL;

    /**
     * `new ExternalMeetingBookingResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalMeetingBookingResponse::with(
     *   bookingTimezone: ...,
     *   calendarEventID: ...,
     *   contactID: ...,
     *   duration: ...,
     *   end: ...,
     *   formFields: ...,
     *   guestEmails: ...,
     *   isOffline: ...,
     *   legalConsentResponses: ...,
     *   start: ...,
     *   subject: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalMeetingBookingResponse)
     *   ->withBookingTimezone(...)
     *   ->withCalendarEventID(...)
     *   ->withContactID(...)
     *   ->withDuration(...)
     *   ->withEnd(...)
     *   ->withFormFields(...)
     *   ->withGuestEmails(...)
     *   ->withIsOffline(...)
     *   ->withLegalConsentResponses(...)
     *   ->withStart(...)
     *   ->withSubject(...)
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
     * @param list<ExternalValidatedFormFieldShape> $formFields
     * @param list<string> $guestEmails
     * @param list<ExternalLegalConsentResponseShape> $legalConsentResponses
     */
    public static function with(
        string $bookingTimezone,
        string $calendarEventID,
        string $contactID,
        int $duration,
        \DateTimeInterface $end,
        array $formFields,
        array $guestEmails,
        bool $isOffline,
        array $legalConsentResponses,
        \DateTimeInterface $start,
        string $subject,
        ?string $locale = null,
        ?string $location = null,
        ?string $webConferenceMeetingID = null,
        ?string $webConferenceURL = null,
    ): self {
        $self = new self;

        $self['bookingTimezone'] = $bookingTimezone;
        $self['calendarEventID'] = $calendarEventID;
        $self['contactID'] = $contactID;
        $self['duration'] = $duration;
        $self['end'] = $end;
        $self['formFields'] = $formFields;
        $self['guestEmails'] = $guestEmails;
        $self['isOffline'] = $isOffline;
        $self['legalConsentResponses'] = $legalConsentResponses;
        $self['start'] = $start;
        $self['subject'] = $subject;

        null !== $locale && $self['locale'] = $locale;
        null !== $location && $self['location'] = $location;
        null !== $webConferenceMeetingID && $self['webConferenceMeetingID'] = $webConferenceMeetingID;
        null !== $webConferenceURL && $self['webConferenceURL'] = $webConferenceURL;

        return $self;
    }

    public function withBookingTimezone(string $bookingTimezone): self
    {
        $self = clone $this;
        $self['bookingTimezone'] = $bookingTimezone;

        return $self;
    }

    public function withCalendarEventID(string $calendarEventID): self
    {
        $self = clone $this;
        $self['calendarEventID'] = $calendarEventID;

        return $self;
    }

    public function withContactID(string $contactID): self
    {
        $self = clone $this;
        $self['contactID'] = $contactID;

        return $self;
    }

    public function withDuration(int $duration): self
    {
        $self = clone $this;
        $self['duration'] = $duration;

        return $self;
    }

    public function withEnd(\DateTimeInterface $end): self
    {
        $self = clone $this;
        $self['end'] = $end;

        return $self;
    }

    /**
     * @param list<ExternalValidatedFormFieldShape> $formFields
     */
    public function withFormFields(array $formFields): self
    {
        $self = clone $this;
        $self['formFields'] = $formFields;

        return $self;
    }

    /**
     * @param list<string> $guestEmails
     */
    public function withGuestEmails(array $guestEmails): self
    {
        $self = clone $this;
        $self['guestEmails'] = $guestEmails;

        return $self;
    }

    public function withIsOffline(bool $isOffline): self
    {
        $self = clone $this;
        $self['isOffline'] = $isOffline;

        return $self;
    }

    /**
     * @param list<ExternalLegalConsentResponseShape> $legalConsentResponses
     */
    public function withLegalConsentResponses(
        array $legalConsentResponses
    ): self {
        $self = clone $this;
        $self['legalConsentResponses'] = $legalConsentResponses;

        return $self;
    }

    public function withStart(\DateTimeInterface $start): self
    {
        $self = clone $this;
        $self['start'] = $start;

        return $self;
    }

    public function withSubject(string $subject): self
    {
        $self = clone $this;
        $self['subject'] = $subject;

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

    public function withWebConferenceMeetingID(
        string $webConferenceMeetingID
    ): self {
        $self = clone $this;
        $self['webConferenceMeetingID'] = $webConferenceMeetingID;

        return $self;
    }

    public function withWebConferenceURL(string $webConferenceURL): self
    {
        $self = clone $this;
        $self['webConferenceURL'] = $webConferenceURL;

        return $self;
    }
}
