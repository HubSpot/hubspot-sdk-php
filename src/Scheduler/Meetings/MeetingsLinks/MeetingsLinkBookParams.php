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
 * @phpstan-type MeetingsLinkBookParamsShape = array{
 *   duration: int,
 *   email: string,
 *   firstName: string,
 *   formFields: list<ExternalBookingFormField|array{name: string, value: string}>,
 *   lastName: string,
 *   legalConsentResponses: list<ExternalLegalConsentResponse|array{
 *     communicationTypeId: string, consented: bool
 *   }>,
 *   likelyAvailableUserIds: list<string>,
 *   slug: string,
 *   startTime: \DateTimeInterface,
 *   locale?: string,
 *   timezone?: string,
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

    /** @var list<string> $likelyAvailableUserIds */
    #[Required(list: 'string')]
    public array $likelyAvailableUserIds;

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
     *   likelyAvailableUserIds: ...,
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
     * @param list<ExternalBookingFormField|array{
     *   name: string, value: string
     * }> $formFields
     * @param list<ExternalLegalConsentResponse|array{
     *   communicationTypeId: string, consented: bool
     * }> $legalConsentResponses
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

        $obj['duration'] = $duration;
        $obj['email'] = $email;
        $obj['firstName'] = $firstName;
        $obj['formFields'] = $formFields;
        $obj['lastName'] = $lastName;
        $obj['legalConsentResponses'] = $legalConsentResponses;
        $obj['likelyAvailableUserIds'] = $likelyAvailableUserIds;
        $obj['slug'] = $slug;
        $obj['startTime'] = $startTime;

        null !== $locale && $obj['locale'] = $locale;
        null !== $timezone && $obj['timezone'] = $timezone;

        return $obj;
    }

    public function withDuration(int $duration): self
    {
        $obj = clone $this;
        $obj['duration'] = $duration;

        return $obj;
    }

    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj['email'] = $email;

        return $obj;
    }

    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj['firstName'] = $firstName;

        return $obj;
    }

    /**
     * @param list<ExternalBookingFormField|array{
     *   name: string, value: string
     * }> $formFields
     */
    public function withFormFields(array $formFields): self
    {
        $obj = clone $this;
        $obj['formFields'] = $formFields;

        return $obj;
    }

    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj['lastName'] = $lastName;

        return $obj;
    }

    /**
     * @param list<ExternalLegalConsentResponse|array{
     *   communicationTypeId: string, consented: bool
     * }> $legalConsentResponses
     */
    public function withLegalConsentResponses(
        array $legalConsentResponses
    ): self {
        $obj = clone $this;
        $obj['legalConsentResponses'] = $legalConsentResponses;

        return $obj;
    }

    /**
     * @param list<string> $likelyAvailableUserIDs
     */
    public function withLikelyAvailableUserIDs(
        array $likelyAvailableUserIDs
    ): self {
        $obj = clone $this;
        $obj['likelyAvailableUserIds'] = $likelyAvailableUserIDs;

        return $obj;
    }

    public function withSlug(string $slug): self
    {
        $obj = clone $this;
        $obj['slug'] = $slug;

        return $obj;
    }

    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $obj = clone $this;
        $obj['startTime'] = $startTime;

        return $obj;
    }

    public function withLocale(string $locale): self
    {
        $obj = clone $this;
        $obj['locale'] = $locale;

        return $obj;
    }

    public function withTimezone(string $timezone): self
    {
        $obj = clone $this;
        $obj['timezone'] = $timezone;

        return $obj;
    }
}
