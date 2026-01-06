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
 *   senderAliasAddress?: string,
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
        $obj = new self;

        $obj['userID'] = $userID;
        $obj['contactID'] = $contactID;
        $obj['senderEmail'] = $senderEmail;
        $obj['sequenceID'] = $sequenceID;

        null !== $senderAliasAddress && $obj['senderAliasAddress'] = $senderAliasAddress;

        return $obj;
    }

    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['userID'] = $userID;

        return $obj;
    }

    public function withContactID(string $contactID): self
    {
        $obj = clone $this;
        $obj['contactID'] = $contactID;

        return $obj;
    }

    public function withSenderEmail(string $senderEmail): self
    {
        $obj = clone $this;
        $obj['senderEmail'] = $senderEmail;

        return $obj;
    }

    public function withSequenceID(string $sequenceID): self
    {
        $obj = clone $this;
        $obj['sequenceID'] = $sequenceID;

        return $obj;
    }

    public function withSenderAliasAddress(string $senderAliasAddress): self
    {
        $obj = clone $this;
        $obj['senderAliasAddress'] = $senderAliasAddress;

        return $obj;
    }
}
