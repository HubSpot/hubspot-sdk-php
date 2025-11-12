<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicSequenceEnrollmentRequestShape = array{
 *   contactId: string,
 *   senderEmail: string,
 *   sequenceId: string,
 *   senderAliasAddress?: string|null,
 * }
 */
final class PublicSequenceEnrollmentRequest implements BaseModel
{
    /** @use SdkModel<PublicSequenceEnrollmentRequestShape> */
    use SdkModel;

    #[Api]
    public string $contactId;

    #[Api]
    public string $senderEmail;

    #[Api]
    public string $sequenceId;

    #[Api(optional: true)]
    public ?string $senderAliasAddress;

    /**
     * `new PublicSequenceEnrollmentRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicSequenceEnrollmentRequest::with(
     *   contactId: ..., senderEmail: ..., sequenceId: ...
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
        string $contactId,
        string $senderEmail,
        string $sequenceId,
        ?string $senderAliasAddress = null,
    ): self {
        $obj = new self;

        $obj->contactId = $contactId;
        $obj->senderEmail = $senderEmail;
        $obj->sequenceId = $sequenceId;

        null !== $senderAliasAddress && $obj->senderAliasAddress = $senderAliasAddress;

        return $obj;
    }

    public function withContactID(string $contactID): self
    {
        $obj = clone $this;
        $obj->contactId = $contactID;

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
        $obj->sequenceId = $sequenceID;

        return $obj;
    }

    public function withSenderAliasAddress(string $senderAliasAddress): self
    {
        $obj = clone $this;
        $obj->senderAliasAddress = $senderAliasAddress;

        return $obj;
    }
}
