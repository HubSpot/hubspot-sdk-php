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

    #[Required('contactId')]
    public string $contactID;

    #[Required]
    public string $senderEmail;

    #[Required('sequenceId')]
    public string $sequenceID;

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
