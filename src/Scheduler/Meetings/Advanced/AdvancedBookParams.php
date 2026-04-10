<?php

declare(strict_types=1);

namespace HubSpotSDK\Scheduler\Meetings\Advanced;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Scheduler\Meetings\ExternalBookingFormField;
use HubSpotSDK\Scheduler\Meetings\ExternalLegalConsentResponse;

/**
 * Book a meeting for a specified meeting page.
 *
 * @see HubSpotSDK\Services\Scheduler\Meetings\AdvancedService::book()
 *
 * @phpstan-import-type ExternalBookingFormFieldShape from \HubSpotSDK\Scheduler\Meetings\ExternalBookingFormField
 * @phpstan-import-type ExternalLegalConsentResponseShape from \HubSpotSDK\Scheduler\Meetings\ExternalLegalConsentResponse
 *
 * @phpstan-type AdvancedBookParamsShape = array{
 *   duration: int,
 *   email: string,
 *   firstName: string,
 *   formFields: list<ExternalBookingFormField|ExternalBookingFormFieldShape>,
 *   lastName: string,
 *   legalConsentResponses: list<ExternalLegalConsentResponse|ExternalLegalConsentResponseShape>,
 *   likelyAvailableUserIDs: list<string>,
 *   slug: string,
 *   startTime: \DateTimeInterface,
 *   locale?: string|null,
 *   timezone?: string|null,
 * }
 */
final class AdvancedBookParams implements BaseModel
{
    /** @use SdkModel<AdvancedBookParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The duration of the meeting in milliseconds.
     */
    #[Required]
    public int $duration;

    /**
     * The email address of the person booking the meeting.
     */
    #[Required]
    public string $email;

    /**
     * The first name of the person booking the meeting.
     */
    #[Required]
    public string $firstName;

    /** @var list<ExternalBookingFormField> $formFields */
    #[Required(list: ExternalBookingFormField::class)]
    public array $formFields;

    /**
     * The last name of the person booking the meeting.
     */
    #[Required]
    public string $lastName;

    /** @var list<ExternalLegalConsentResponse> $legalConsentResponses */
    #[Required(list: ExternalLegalConsentResponse::class)]
    public array $legalConsentResponses;

    /** @var list<string> $likelyAvailableUserIDs */
    #[Required('likelyAvailableUserIds', list: 'string')]
    public array $likelyAvailableUserIDs;

    /**
     * The unique path identifier for the meeting page.
     */
    #[Required]
    public string $slug;

    /**
     * The date and time when the meeting is scheduled to start, in ISO 8601 format.
     */
    #[Required]
    public \DateTimeInterface $startTime;

    /**
     * The locale used for formatting dates and times in the meeting booking.
     */
    #[Optional]
    public ?string $locale;

    /**
     * The timezone in which the meeting is scheduled.
     */
    #[Optional]
    public ?string $timezone;

    /**
     * `new AdvancedBookParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AdvancedBookParams::with(
     *   duration: ...,
     *   email: ...,
     *   firstName: ...,
     *   formFields: ...,
     *   lastName: ...,
     *   legalConsentResponses: ...,
     *   likelyAvailableUserIDs: ...,
     *   slug: ...,
     *   startTime: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AdvancedBookParams)
     *   ->withDuration(...)
     *   ->withEmail(...)
     *   ->withFirstName(...)
     *   ->withFormFields(...)
     *   ->withLastName(...)
     *   ->withLegalConsentResponses(...)
     *   ->withLikelyAvailableUserIDs(...)
     *   ->withSlug(...)
     *   ->withStartTime(...)
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
     * @param list<ExternalBookingFormField|ExternalBookingFormFieldShape> $formFields
     * @param list<ExternalLegalConsentResponse|ExternalLegalConsentResponseShape> $legalConsentResponses
     * @param list<string> $likelyAvailableUserIDs
     */
    public static function with(
        int $duration,
        string $email,
        string $firstName,
        array $formFields,
        string $lastName,
        array $legalConsentResponses,
        array $likelyAvailableUserIDs,
        string $slug,
        \DateTimeInterface $startTime,
        ?string $locale = null,
        ?string $timezone = null,
    ): self {
        $self = new self;

        $self['duration'] = $duration;
        $self['email'] = $email;
        $self['firstName'] = $firstName;
        $self['formFields'] = $formFields;
        $self['lastName'] = $lastName;
        $self['legalConsentResponses'] = $legalConsentResponses;
        $self['likelyAvailableUserIDs'] = $likelyAvailableUserIDs;
        $self['slug'] = $slug;
        $self['startTime'] = $startTime;

        null !== $locale && $self['locale'] = $locale;
        null !== $timezone && $self['timezone'] = $timezone;

        return $self;
    }

    /**
     * The duration of the meeting in milliseconds.
     */
    public function withDuration(int $duration): self
    {
        $self = clone $this;
        $self['duration'] = $duration;

        return $self;
    }

    /**
     * The email address of the person booking the meeting.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * The first name of the person booking the meeting.
     */
    public function withFirstName(string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    /**
     * @param list<ExternalBookingFormField|ExternalBookingFormFieldShape> $formFields
     */
    public function withFormFields(array $formFields): self
    {
        $self = clone $this;
        $self['formFields'] = $formFields;

        return $self;
    }

    /**
     * The last name of the person booking the meeting.
     */
    public function withLastName(string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }

    /**
     * @param list<ExternalLegalConsentResponse|ExternalLegalConsentResponseShape> $legalConsentResponses
     */
    public function withLegalConsentResponses(
        array $legalConsentResponses
    ): self {
        $self = clone $this;
        $self['legalConsentResponses'] = $legalConsentResponses;

        return $self;
    }

    /**
     * @param list<string> $likelyAvailableUserIDs
     */
    public function withLikelyAvailableUserIDs(
        array $likelyAvailableUserIDs
    ): self {
        $self = clone $this;
        $self['likelyAvailableUserIDs'] = $likelyAvailableUserIDs;

        return $self;
    }

    /**
     * The unique path identifier for the meeting page.
     */
    public function withSlug(string $slug): self
    {
        $self = clone $this;
        $self['slug'] = $slug;

        return $self;
    }

    /**
     * The date and time when the meeting is scheduled to start, in ISO 8601 format.
     */
    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $self = clone $this;
        $self['startTime'] = $startTime;

        return $self;
    }

    /**
     * The locale used for formatting dates and times in the meeting booking.
     */
    public function withLocale(string $locale): self
    {
        $self = clone $this;
        $self['locale'] = $locale;

        return $self;
    }

    /**
     * The timezone in which the meeting is scheduled.
     */
    public function withTimezone(string $timezone): self
    {
        $self = clone $this;
        $self['timezone'] = $timezone;

        return $self;
    }
}
