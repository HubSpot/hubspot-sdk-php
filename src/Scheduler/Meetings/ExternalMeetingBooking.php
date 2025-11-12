<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalMeetingBookingShape = array{
 *   duration: int,
 *   email: string,
 *   firstName: string,
 *   formFields: list<ExternalBookingFormField>,
 *   lastName: string,
 *   legalConsentResponses: list<ExternalLegalConsentResponse>,
 *   likelyAvailableUserIds: list<string>,
 *   slug: string,
 *   startTime: \DateTimeInterface,
 *   locale?: string|null,
 *   timezone?: string|null,
 * }
 */
final class ExternalMeetingBooking implements BaseModel
{
    /** @use SdkModel<ExternalMeetingBookingShape> */
    use SdkModel;

    #[Api]
    public int $duration;

    #[Api]
    public string $email;

    #[Api]
    public string $firstName;

    /** @var list<ExternalBookingFormField> $formFields */
    #[Api(list: ExternalBookingFormField::class)]
    public array $formFields;

    #[Api]
    public string $lastName;

    /** @var list<ExternalLegalConsentResponse> $legalConsentResponses */
    #[Api(list: ExternalLegalConsentResponse::class)]
    public array $legalConsentResponses;

    /** @var list<string> $likelyAvailableUserIds */
    #[Api(list: 'string')]
    public array $likelyAvailableUserIds;

    #[Api]
    public string $slug;

    #[Api]
    public \DateTimeInterface $startTime;

    #[Api(optional: true)]
    public ?string $locale;

    #[Api(optional: true)]
    public ?string $timezone;

    /**
     * `new ExternalMeetingBooking()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalMeetingBooking::with(
     *   duration: ...,
     *   email: ...,
     *   firstName: ...,
     *   formFields: ...,
     *   lastName: ...,
     *   legalConsentResponses: ...,
     *   likelyAvailableUserIds: ...,
     *   slug: ...,
     *   startTime: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalMeetingBooking)
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
     * @param list<ExternalBookingFormField> $formFields
     * @param list<ExternalLegalConsentResponse> $legalConsentResponses
     * @param list<string> $likelyAvailableUserIds
     */
    public static function with(
        int $duration,
        string $email,
        string $firstName,
        array $formFields,
        string $lastName,
        array $legalConsentResponses,
        array $likelyAvailableUserIds,
        string $slug,
        \DateTimeInterface $startTime,
        ?string $locale = null,
        ?string $timezone = null,
    ): self {
        $obj = new self;

        $obj->duration = $duration;
        $obj->email = $email;
        $obj->firstName = $firstName;
        $obj->formFields = $formFields;
        $obj->lastName = $lastName;
        $obj->legalConsentResponses = $legalConsentResponses;
        $obj->likelyAvailableUserIds = $likelyAvailableUserIds;
        $obj->slug = $slug;
        $obj->startTime = $startTime;

        null !== $locale && $obj->locale = $locale;
        null !== $timezone && $obj->timezone = $timezone;

        return $obj;
    }

    public function withDuration(int $duration): self
    {
        $obj = clone $this;
        $obj->duration = $duration;

        return $obj;
    }

    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj->firstName = $firstName;

        return $obj;
    }

    /**
     * @param list<ExternalBookingFormField> $formFields
     */
    public function withFormFields(array $formFields): self
    {
        $obj = clone $this;
        $obj->formFields = $formFields;

        return $obj;
    }

    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj->lastName = $lastName;

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

    /**
     * @param list<string> $likelyAvailableUserIDs
     */
    public function withLikelyAvailableUserIDs(
        array $likelyAvailableUserIDs
    ): self {
        $obj = clone $this;
        $obj->likelyAvailableUserIds = $likelyAvailableUserIDs;

        return $obj;
    }

    public function withSlug(string $slug): self
    {
        $obj = clone $this;
        $obj->slug = $slug;

        return $obj;
    }

    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $obj = clone $this;
        $obj->startTime = $startTime;

        return $obj;
    }

    public function withLocale(string $locale): self
    {
        $obj = clone $this;
        $obj->locale = $locale;

        return $obj;
    }

    public function withTimezone(string $timezone): self
    {
        $obj = clone $this;
        $obj->timezone = $timezone;

        return $obj;
    }
}
