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

    #[Required]
    public string $id;

    #[Required]
    public \DateTimeInterface $enrolledAt;

    #[Required]
    public string $toEmail;

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
