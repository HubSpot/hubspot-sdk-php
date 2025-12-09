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
 *   userId: string,
 *   contactId: string,
 *   senderEmail: string,
 *   sequenceId: string,
 *   senderAliasAddress?: string,
 * }
 */
final class EnrollmentEnrollParams implements BaseModel
{
    /** @use SdkModel<EnrollmentEnrollParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $userId;

    #[Required]
    public string $contactId;

    #[Required]
    public string $senderEmail;

    #[Required]
    public string $sequenceId;

    #[Optional]
    public ?string $senderAliasAddress;

    /**
     * `new EnrollmentEnrollParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EnrollmentEnrollParams::with(
     *   userId: ..., contactId: ..., senderEmail: ..., sequenceId: ...
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
        string $userId,
        string $contactId,
        string $senderEmail,
        string $sequenceId,
        ?string $senderAliasAddress = null,
    ): self {
        $obj = new self;

        $obj['userId'] = $userId;
        $obj['contactId'] = $contactId;
        $obj['senderEmail'] = $senderEmail;
        $obj['sequenceId'] = $sequenceId;

        null !== $senderAliasAddress && $obj['senderAliasAddress'] = $senderAliasAddress;

        return $obj;
    }

    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['userId'] = $userID;

        return $obj;
    }

    public function withContactID(string $contactID): self
    {
        $obj = clone $this;
        $obj['contactId'] = $contactID;

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
        $obj['sequenceId'] = $sequenceID;

        return $obj;
    }

    public function withSenderAliasAddress(string $senderAliasAddress): self
    {
        $obj = clone $this;
        $obj['senderAliasAddress'] = $senderAliasAddress;

        return $obj;
    }
}
