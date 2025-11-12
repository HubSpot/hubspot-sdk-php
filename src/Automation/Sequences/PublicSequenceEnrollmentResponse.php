<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicSequenceEnrollmentResponseShape = array{
 *   id: string,
 *   enrolledAt: \DateTimeInterface,
 *   enrolledBy: string,
 *   enrolledByEmail: string,
 *   sequenceId: string,
 *   sequenceName: string,
 *   toEmail: string,
 *   updatedAt: \DateTimeInterface,
 * }
 */
final class PublicSequenceEnrollmentResponse implements BaseModel
{
    /** @use SdkModel<PublicSequenceEnrollmentResponseShape> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public \DateTimeInterface $enrolledAt;

    #[Api]
    public string $enrolledBy;

    #[Api]
    public string $enrolledByEmail;

    #[Api]
    public string $sequenceId;

    #[Api]
    public string $sequenceName;

    #[Api]
    public string $toEmail;

    #[Api]
    public \DateTimeInterface $updatedAt;

    /**
     * `new PublicSequenceEnrollmentResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicSequenceEnrollmentResponse::with(
     *   id: ...,
     *   enrolledAt: ...,
     *   enrolledBy: ...,
     *   enrolledByEmail: ...,
     *   sequenceId: ...,
     *   sequenceName: ...,
     *   toEmail: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicSequenceEnrollmentResponse)
     *   ->withID(...)
     *   ->withEnrolledAt(...)
     *   ->withEnrolledBy(...)
     *   ->withEnrolledByEmail(...)
     *   ->withSequenceID(...)
     *   ->withSequenceName(...)
     *   ->withToEmail(...)
     *   ->withUpdatedAt(...)
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
        string $id,
        \DateTimeInterface $enrolledAt,
        string $enrolledBy,
        string $enrolledByEmail,
        string $sequenceId,
        string $sequenceName,
        string $toEmail,
        \DateTimeInterface $updatedAt,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->enrolledAt = $enrolledAt;
        $obj->enrolledBy = $enrolledBy;
        $obj->enrolledByEmail = $enrolledByEmail;
        $obj->sequenceId = $sequenceId;
        $obj->sequenceName = $sequenceName;
        $obj->toEmail = $toEmail;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withEnrolledAt(\DateTimeInterface $enrolledAt): self
    {
        $obj = clone $this;
        $obj->enrolledAt = $enrolledAt;

        return $obj;
    }

    public function withEnrolledBy(string $enrolledBy): self
    {
        $obj = clone $this;
        $obj->enrolledBy = $enrolledBy;

        return $obj;
    }

    public function withEnrolledByEmail(string $enrolledByEmail): self
    {
        $obj = clone $this;
        $obj->enrolledByEmail = $enrolledByEmail;

        return $obj;
    }

    public function withSequenceID(string $sequenceID): self
    {
        $obj = clone $this;
        $obj->sequenceId = $sequenceID;

        return $obj;
    }

    public function withSequenceName(string $sequenceName): self
    {
        $obj = clone $this;
        $obj->sequenceName = $sequenceName;

        return $obj;
    }

    public function withToEmail(string $toEmail): self
    {
        $obj = clone $this;
        $obj->toEmail = $toEmail;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
