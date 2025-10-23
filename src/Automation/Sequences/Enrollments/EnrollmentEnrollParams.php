<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences\Enrollments;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Enroll a contact into a sequence using the specified user ID and sequence details.
 *
 * @see HubspotSDK\Automation\Sequences\Enrollments->enroll
 *
 * @phpstan-type enrollment_enroll_params = array{
 *   contactID: string,
 *   senderEmail: string,
 *   sequenceID: string,
 *   senderAliasAddress?: string,
 * }
 */
final class EnrollmentEnrollParams implements BaseModel
{
    /** @use SdkModel<enrollment_enroll_params> */
    use SdkModel;
    use SdkParams;

    #[Api('contactId')]
    public string $contactID;

    #[Api]
    public string $senderEmail;

    #[Api('sequenceId')]
    public string $sequenceID;

    #[Api(optional: true)]
    public ?string $senderAliasAddress;

    /**
     * `new EnrollmentEnrollParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EnrollmentEnrollParams::with(contactID: ..., senderEmail: ..., sequenceID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EnrollmentEnrollParams)
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
