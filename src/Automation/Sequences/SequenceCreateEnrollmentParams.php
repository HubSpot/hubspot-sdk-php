<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Enroll a contact into a sequence using the specified sequence ID and sender email. This endpoint requires the user ID to be provided as a query parameter and a valid JSON body with the necessary enrollment details. It is used to automate the process of enrolling contacts into predefined sequences for streamlined communication.
 *
 * @see HubspotSDK\Services\Automation\SequencesService::createEnrollment()
 *
 * @phpstan-type SequenceCreateEnrollmentParamsShape = array{
 *   userID: string,
 *   contactID: string,
 *   senderEmail: string,
 *   sequenceID: string,
 *   senderAliasAddress?: string|null,
 * }
 */
final class SequenceCreateEnrollmentParams implements BaseModel
{
    /** @use SdkModel<SequenceCreateEnrollmentParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The unique identifier of the user performing the enrollment. This parameter is required.
     */
    #[Required]
    public string $userID;

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
     * `new SequenceCreateEnrollmentParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SequenceCreateEnrollmentParams::with(
     *   userID: ..., contactID: ..., senderEmail: ..., sequenceID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SequenceCreateEnrollmentParams)
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

    /**
     * The unique identifier of the user performing the enrollment. This parameter is required.
     */
    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

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
