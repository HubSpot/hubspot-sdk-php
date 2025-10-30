<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalMeetingBookingResponseShape = array{
 *   bookingTimezone: string,
 *   calendarEventID: string,
 *   contactID: string,
 *   duration: int,
 *   end: \DateTimeInterface,
 *   formFields: list<ExternalValidatedFormField>,
 *   guestEmails: list<string>,
 *   isOffline: bool,
 *   legalConsentResponses: list<ExternalLegalConsentResponse>,
 *   start: \DateTimeInterface,
 *   subject: string,
 *   locale?: string,
 *   location?: string,
 *   webConferenceMeetingID?: string,
 *   webConferenceURL?: string,
 * }
 */
final class ExternalMeetingBookingResponse implements BaseModel
{
    /** @use SdkModel<ExternalMeetingBookingResponseShape> */
    use SdkModel;

    #[Api]
    public string $bookingTimezone;

    #[Api('calendarEventId')]
    public string $calendarEventID;

    #[Api('contactId')]
    public string $contactID;

    #[Api]
    public int $duration;

    #[Api]
    public \DateTimeInterface $end;

    /** @var list<ExternalValidatedFormField> $formFields */
    #[Api(list: ExternalValidatedFormField::class)]
    public array $formFields;

    /** @var list<string> $guestEmails */
    #[Api(list: 'string')]
    public array $guestEmails;

    #[Api]
    public bool $isOffline;

    /** @var list<ExternalLegalConsentResponse> $legalConsentResponses */
    #[Api(list: ExternalLegalConsentResponse::class)]
    public array $legalConsentResponses;

    #[Api]
    public \DateTimeInterface $start;

    #[Api]
    public string $subject;

    #[Api(optional: true)]
    public ?string $locale;

    #[Api(optional: true)]
    public ?string $location;

    #[Api('webConferenceMeetingId', optional: true)]
    public ?string $webConferenceMeetingID;

    #[Api('webConferenceUrl', optional: true)]
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
     * @param list<ExternalValidatedFormField> $formFields
     * @param list<string> $guestEmails
     * @param list<ExternalLegalConsentResponse> $legalConsentResponses
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
        $obj = new self;

        $obj->bookingTimezone = $bookingTimezone;
        $obj->calendarEventID = $calendarEventID;
        $obj->contactID = $contactID;
        $obj->duration = $duration;
        $obj->end = $end;
        $obj->formFields = $formFields;
        $obj->guestEmails = $guestEmails;
        $obj->isOffline = $isOffline;
        $obj->legalConsentResponses = $legalConsentResponses;
        $obj->start = $start;
        $obj->subject = $subject;

        null !== $locale && $obj->locale = $locale;
        null !== $location && $obj->location = $location;
        null !== $webConferenceMeetingID && $obj->webConferenceMeetingID = $webConferenceMeetingID;
        null !== $webConferenceURL && $obj->webConferenceURL = $webConferenceURL;

        return $obj;
    }

    public function withBookingTimezone(string $bookingTimezone): self
    {
        $obj = clone $this;
        $obj->bookingTimezone = $bookingTimezone;

        return $obj;
    }

    public function withCalendarEventID(string $calendarEventID): self
    {
        $obj = clone $this;
        $obj->calendarEventID = $calendarEventID;

        return $obj;
    }

    public function withContactID(string $contactID): self
    {
        $obj = clone $this;
        $obj->contactID = $contactID;

        return $obj;
    }

    public function withDuration(int $duration): self
    {
        $obj = clone $this;
        $obj->duration = $duration;

        return $obj;
    }

    public function withEnd(\DateTimeInterface $end): self
    {
        $obj = clone $this;
        $obj->end = $end;

        return $obj;
    }

    /**
     * @param list<ExternalValidatedFormField> $formFields
     */
    public function withFormFields(array $formFields): self
    {
        $obj = clone $this;
        $obj->formFields = $formFields;

        return $obj;
    }

    /**
     * @param list<string> $guestEmails
     */
    public function withGuestEmails(array $guestEmails): self
    {
        $obj = clone $this;
        $obj->guestEmails = $guestEmails;

        return $obj;
    }

    public function withIsOffline(bool $isOffline): self
    {
        $obj = clone $this;
        $obj->isOffline = $isOffline;

        return $obj;
    }

    /**
     * @param list<ExternalLegalConsentResponse> $legalConsentResponses
     */
    public function withLegalConsentResponses(
        array $legalConsentResponses
    ): self {
        $obj = clone $this;
        $obj->legalConsentResponses = $legalConsentResponses;

        return $obj;
    }

    public function withStart(\DateTimeInterface $start): self
    {
        $obj = clone $this;
        $obj->start = $start;

        return $obj;
    }

    public function withSubject(string $subject): self
    {
        $obj = clone $this;
        $obj->subject = $subject;

        return $obj;
    }

    public function withLocale(string $locale): self
    {
        $obj = clone $this;
        $obj->locale = $locale;

        return $obj;
    }

    public function withLocation(string $location): self
    {
        $obj = clone $this;
        $obj->location = $location;

        return $obj;
    }

    public function withWebConferenceMeetingID(
        string $webConferenceMeetingID
    ): self {
        $obj = clone $this;
        $obj->webConferenceMeetingID = $webConferenceMeetingID;

        return $obj;
    }

    public function withWebConferenceURL(string $webConferenceURL): self
    {
        $obj = clone $this;
        $obj->webConferenceURL = $webConferenceURL;

        return $obj;
    }
}
