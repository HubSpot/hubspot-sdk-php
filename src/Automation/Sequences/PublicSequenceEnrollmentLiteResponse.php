<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Core\Attributes\Api;
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

    #[Api]
    public string $id;

    #[Api]
    public \DateTimeInterface $enrolledAt;

    #[Api]
    public string $toEmail;

    #[Api]
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
        $obj = new self;

        $obj->id = $id;
        $obj->enrolledAt = $enrolledAt;
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
