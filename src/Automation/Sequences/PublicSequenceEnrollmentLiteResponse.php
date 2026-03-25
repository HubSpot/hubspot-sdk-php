<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicSequenceEnrollmentLiteResponseShape = array{
 *   id: string,
 *   enrolledAt: \DateTimeInterface,
 *   toEmail: string,
 *   updatedAt: \DateTimeInterface,
 * }
 */
final class PublicSequenceEnrollmentLiteResponse implements BaseModel
{
    /** @use SdkModel<PublicSequenceEnrollmentLiteResponseShape> */
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
     * `new PublicSequenceEnrollmentLiteResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicSequenceEnrollmentLiteResponse::with(
     *   id: ..., enrolledAt: ..., toEmail: ..., updatedAt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicSequenceEnrollmentLiteResponse)
     *   ->withID(...)
     *   ->withEnrolledAt(...)
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
        string $toEmail,
        \DateTimeInterface $updatedAt,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['enrolledAt'] = $enrolledAt;
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
