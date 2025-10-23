<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_sequence_enrollment_request = array{
 *   contactID: string,
 *   senderEmail: string,
 *   sequenceID: string,
 *   senderAliasAddress?: string,
 * }
 */
final class PublicSequenceEnrollmentRequest implements BaseModel
{
    /** @use SdkModel<public_sequence_enrollment_request> */
    use SdkModel;

    #[Api('contactId')]
    public string $contactID;

    #[Api]
    public string $senderEmail;

    #[Api('sequenceId')]
    public string $sequenceID;

    #[Api(optional: true)]
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
        $obj = new self;

        $obj->contactID = $contactID;
        $obj->senderEmail = $senderEmail;
        $obj->sequenceID = $sequenceID;

        null !== $senderAliasAddress && $obj->senderAliasAddress = $senderAliasAddress;

        return $obj;
    }

    public function withContactID(string $contactID): self
    {
        $obj = clone $this;
        $obj->contactID = $contactID;

        return $obj;
    }

    public function withSenderEmail(string $senderEmail): self
    {
        $obj = clone $this;
        $obj->senderEmail = $senderEmail;

        return $obj;
    }

    public function withSequenceID(string $sequenceID): self
    {
        $obj = clone $this;
        $obj->sequenceID = $sequenceID;

        return $obj;
    }

    public function withSenderAliasAddress(string $senderAliasAddress): self
    {
        $obj = clone $this;
        $obj->senderAliasAddress = $senderAliasAddress;

        return $obj;
    }
}
