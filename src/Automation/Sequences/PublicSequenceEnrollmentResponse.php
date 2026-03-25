<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicSequenceEnrollmentResponseShape = array{
 *   id: string,
 *   enrolledAt: \DateTimeInterface,
 *   enrolledBy: string,
 *   enrolledByEmail: string,
 *   sequenceID: string,
 *   sequenceName: string,
 *   toEmail: string,
 *   updatedAt: \DateTimeInterface,
 * }
 */
final class PublicSequenceEnrollmentResponse implements BaseModel
{
    /** @use SdkModel<PublicSequenceEnrollmentResponseShape> */
    use SdkModel;

    /**
     * The unique identifier for the sequence enrollment.
     */
    #[Required]
    public string $id;

    /**
     * The date and time when the contact was enrolled in the sequence.
     */
    #[Required]
    public \DateTimeInterface $enrolledAt;

    /**
     * The identifier of the user who enrolled the contact in the sequence.
     */
    #[Required]
    public string $enrolledBy;

    /**
     * The email address of the user who enrolled the contact in the sequence.
     */
    #[Required]
    public string $enrolledByEmail;

    /**
     * The unique identifier of the sequence in which the contact is enrolled.
     */
    #[Required('sequenceId')]
    public string $sequenceID;

    /**
     * The name of the sequence in which the contact is enrolled.
     */
    #[Required]
    public string $sequenceName;

    /**
     * The email address of the contact enrolled in the sequence.
     */
    #[Required]
    public string $toEmail;

    /**
     * The date and time when the sequence enrollment was last updated.
     */
    #[Required]
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
     *   sequenceID: ...,
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
        string $sequenceID,
        string $sequenceName,
        string $toEmail,
        \DateTimeInterface $updatedAt,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['enrolledAt'] = $enrolledAt;
        $self['enrolledBy'] = $enrolledBy;
        $self['enrolledByEmail'] = $enrolledByEmail;
        $self['sequenceID'] = $sequenceID;
        $self['sequenceName'] = $sequenceName;
        $self['toEmail'] = $toEmail;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The unique identifier for the sequence enrollment.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The date and time when the contact was enrolled in the sequence.
     */
    public function withEnrolledAt(\DateTimeInterface $enrolledAt): self
    {
        $self = clone $this;
        $self['enrolledAt'] = $enrolledAt;

        return $self;
    }

    /**
     * The identifier of the user who enrolled the contact in the sequence.
     */
    public function withEnrolledBy(string $enrolledBy): self
    {
        $self = clone $this;
        $self['enrolledBy'] = $enrolledBy;

        return $self;
    }

    /**
     * The email address of the user who enrolled the contact in the sequence.
     */
    public function withEnrolledByEmail(string $enrolledByEmail): self
    {
        $self = clone $this;
        $self['enrolledByEmail'] = $enrolledByEmail;

        return $self;
    }

    /**
     * The unique identifier of the sequence in which the contact is enrolled.
     */
    public function withSequenceID(string $sequenceID): self
    {
        $self = clone $this;
        $self['sequenceID'] = $sequenceID;

        return $self;
    }

    /**
     * The name of the sequence in which the contact is enrolled.
     */
    public function withSequenceName(string $sequenceName): self
    {
        $self = clone $this;
        $self['sequenceName'] = $sequenceName;

        return $self;
    }

    /**
     * The email address of the contact enrolled in the sequence.
     */
    public function withToEmail(string $toEmail): self
    {
        $self = clone $this;
        $self['toEmail'] = $toEmail;

        return $self;
    }

    /**
     * The date and time when the sequence enrollment was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
