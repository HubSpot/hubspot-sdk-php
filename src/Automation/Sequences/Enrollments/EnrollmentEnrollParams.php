<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences\Enrollments;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Enroll a contact into a sequence using the specified user ID and sequence details.
 *
 * @see HubspotSDK\Services\Automation\Sequences\EnrollmentsService::enroll()
 *
 * @phpstan-type EnrollmentEnrollParamsShape = array{
 *   userID: string,
 *   contactID: string,
 *   senderEmail: string,
 *   sequenceID: string,
 *   senderAliasAddress?: string|null,
 * }
 */
final class EnrollmentEnrollParams implements BaseModel
{
    /** @use SdkModel<EnrollmentEnrollParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $userID;

    #[Required('contactId')]
    public string $contactID;

    #[Required]
    public string $senderEmail;

    #[Required('sequenceId')]
    public string $sequenceID;

    #[Optional]
    public ?string $senderAliasAddress;

    /**
     * `new EnrollmentEnrollParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EnrollmentEnrollParams::with(
     *   userID: ..., contactID: ..., senderEmail: ..., sequenceID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EnrollmentEnrollParams)
     *   ->withUserID(...)
     *   ->withContactID(...)
     *   ->withSenderEmail(...)
     *   ->withSequenceID(...)
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
     */
    public static function with(
        string $userID,
        string $contactID,
        string $senderEmail,
        string $sequenceID,
        ?string $senderAliasAddress = null,
    ): self {
        $self = new self;

        $self['userID'] = $userID;
        $self['contactID'] = $contactID;
        $self['senderEmail'] = $senderEmail;
        $self['sequenceID'] = $sequenceID;

        null !== $senderAliasAddress && $self['senderAliasAddress'] = $senderAliasAddress;

        return $self;
    }

    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    public function withContactID(string $contactID): self
    {
        $self = clone $this;
        $self['contactID'] = $contactID;

        return $self;
    }

    public function withSenderEmail(string $senderEmail): self
    {
        $self = clone $this;
        $self['senderEmail'] = $senderEmail;

        return $self;
    }

    public function withSequenceID(string $sequenceID): self
    {
        $self = clone $this;
        $self['sequenceID'] = $sequenceID;

        return $self;
    }

    public function withSenderAliasAddress(string $senderAliasAddress): self
    {
        $self = clone $this;
        $self['senderAliasAddress'] = $senderAliasAddress;

        return $self;
    }
}
