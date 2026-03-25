<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicSequenceEnrollmentRequestShape = array{
 *   contactID: string,
 *   senderEmail: string,
 *   sequenceID: string,
 *   senderAliasAddress?: string|null,
 * }
 */
final class PublicSequenceEnrollmentRequest implements BaseModel
{
    /** @use SdkModel<PublicSequenceEnrollmentRequestShape> */
    use SdkModel;

    /**
     * The unique identifier of the contact to be enrolled in the sequence.
     */
    #[Required('contactId')]
    public string $contactID;

    /**
     * The email address of the sender enrolling the contact in the sequence.
     */
    #[Required]
    public string $senderEmail;

    /**
     * The unique identifier of the sequence in which the contact will be enrolled.
     */
    #[Required('sequenceId')]
    public string $sequenceID;

    /**
     * The alias email address used by the sender when enrolling the contact.
     */
    #[Optional]
    public ?string $senderAliasAddress;

    /**
     * `new PublicSequenceEnrollmentRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicSequenceEnrollmentRequest::with(
     *   contactID: ..., senderEmail: ..., sequenceID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicSequenceEnrollmentRequest)
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
        string $contactID,
        string $senderEmail,
        string $sequenceID,
        ?string $senderAliasAddress = null,
    ): self {
        $self = new self;

        $self['contactID'] = $contactID;
        $self['senderEmail'] = $senderEmail;
        $self['sequenceID'] = $sequenceID;

        null !== $senderAliasAddress && $self['senderAliasAddress'] = $senderAliasAddress;

        return $self;
    }

    /**
     * The unique identifier of the contact to be enrolled in the sequence.
     */
    public function withContactID(string $contactID): self
    {
        $self = clone $this;
        $self['contactID'] = $contactID;

        return $self;
    }

    /**
     * The email address of the sender enrolling the contact in the sequence.
     */
    public function withSenderEmail(string $senderEmail): self
    {
        $self = clone $this;
        $self['senderEmail'] = $senderEmail;

        return $self;
    }

    /**
     * The unique identifier of the sequence in which the contact will be enrolled.
     */
    public function withSequenceID(string $sequenceID): self
    {
        $self = clone $this;
        $self['sequenceID'] = $sequenceID;

        return $self;
    }

    /**
     * The alias email address used by the sender when enrolling the contact.
     */
    public function withSenderAliasAddress(string $senderAliasAddress): self
    {
        $self = clone $this;
        $self['senderAliasAddress'] = $senderAliasAddress;

        return $self;
    }
}
