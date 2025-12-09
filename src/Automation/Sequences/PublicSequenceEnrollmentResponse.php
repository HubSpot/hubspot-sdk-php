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

    #[Required]
    public string $id;

    #[Required]
    public \DateTimeInterface $enrolledAt;

    #[Required]
    public string $enrolledBy;

    #[Required]
    public string $enrolledByEmail;

    #[Required('sequenceId')]
    public string $sequenceID;

    #[Required]
    public string $sequenceName;

    #[Required]
    public string $toEmail;

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

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withEnrolledAt(\DateTimeInterface $enrolledAt): self
    {
        $self = clone $this;
        $self['enrolledAt'] = $enrolledAt;

        return $self;
    }

    public function withEnrolledBy(string $enrolledBy): self
    {
        $self = clone $this;
        $self['enrolledBy'] = $enrolledBy;

        return $self;
    }

    public function withEnrolledByEmail(string $enrolledByEmail): self
    {
        $self = clone $this;
        $self['enrolledByEmail'] = $enrolledByEmail;

        return $self;
    }

    public function withSequenceID(string $sequenceID): self
    {
        $self = clone $this;
        $self['sequenceID'] = $sequenceID;

        return $self;
    }

    public function withSequenceName(string $sequenceName): self
    {
        $self = clone $this;
        $self['sequenceName'] = $sequenceName;

        return $self;
    }

    public function withToEmail(string $toEmail): self
    {
        $self = clone $this;
        $self['toEmail'] = $toEmail;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
