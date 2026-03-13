<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings\MeetingsLinks;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Scheduler\Meetings\ExternalBookingFormField;
use HubspotSDK\Scheduler\Meetings\ExternalLegalConsentResponse;

/**
 * Book a meeting for a specified meeting page.
 *
 * @see HubspotSDK\Services\Scheduler\Meetings\MeetingsLinksService::book()
 *
 * @phpstan-import-type ExternalBookingFormFieldShape from \HubspotSDK\Scheduler\Meetings\ExternalBookingFormField
 * @phpstan-import-type ExternalLegalConsentResponseShape from \HubspotSDK\Scheduler\Meetings\ExternalLegalConsentResponse
 *
 * @phpstan-type MeetingsLinkBookParamsShape = array{
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
final class MeetingsLinkBookParams implements BaseModel
{
    /** @use SdkModel<MeetingsLinkBookParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $duration;

    #[Required]
    public string $email;

    #[Required]
    public string $firstName;

    /** @var list<ExternalBookingFormField> $formFields */
    #[Required(list: ExternalBookingFormField::class)]
    public array $formFields;

    #[Required]
    public string $lastName;

    /** @var list<ExternalLegalConsentResponse> $legalConsentResponses */
    #[Required(list: ExternalLegalConsentResponse::class)]
    public array $legalConsentResponses;

    /** @var list<string> $likelyAvailableUserIDs */
    #[Required('likelyAvailableUserIds', list: 'string')]
    public array $likelyAvailableUserIDs;

    #[Required]
    public string $slug;

    #[Required]
    public \DateTimeInterface $startTime;

    #[Optional]
    public ?string $locale;

    #[Optional]
    public ?string $timezone;

    /**
     * `new MeetingsLinkBookParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MeetingsLinkBookParams::with(
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
     * (new MeetingsLinkBookParams)
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

    public function withDuration(int $duration): self
    {
        $self = clone $this;
        $self['duration'] = $duration;

        return $self;
    }

    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

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

    public function withSlug(string $slug): self
    {
        $self = clone $this;
        $self['slug'] = $slug;

        return $self;
    }

    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $self = clone $this;
        $self['startTime'] = $startTime;

        return $self;
    }

    public function withLocale(string $locale): self
    {
        $self = clone $this;
        $self['locale'] = $locale;

        return $self;
    }

    public function withTimezone(string $timezone): self
    {
        $self = clone $this;
        $self['timezone'] = $timezone;

        return $self;
    }
}
