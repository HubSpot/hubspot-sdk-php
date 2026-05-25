<?php

declare(strict_types=1);

namespace HubSpotSDK;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\SnapshotStatusResponse\ErrorCode;
use HubSpotSDK\SnapshotStatusResponse\Status;

/**
 * @phpstan-type SnapshotStatusResponseShape = array{
 *   id: string,
 *   initiatedAt: int,
 *   status: Status|value-of<Status>,
 *   completedAt?: int|null,
 *   errorCode?: null|ErrorCode|value-of<ErrorCode>,
 *   message?: string|null,
 * }
 */
final class SnapshotStatusResponse implements BaseModel
{
    /** @use SdkModel<SnapshotStatusResponseShape> */
    use SdkModel;

    /**
     * The unique identifier for the snapshot operation, represented as a UUID.
     */
    #[Required]
    public string $id;

    /**
     * The timestamp indicating when the snapshot operation was initiated, represented as a Unix timestamp in milliseconds.
     */
    #[Required]
    public int $initiatedAt;

    /**
     * The current status of the snapshot. Valid values include 'PENDING', 'IN_PROGRESS', 'COMPLETED', 'FAILED', and 'EXPIRED'.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * The timestamp indicating when the snapshot operation was completed, represented as a Unix timestamp in milliseconds.
     */
    #[Optional]
    public ?int $completedAt;

    /**
     * A code representing the error that occurred, if any. Possible values are 'TIMEOUT', 'VALIDATION_ERROR', 'INTERNAL_ERROR', and 'PERMISSION_DENIED'.
     *
     * @var value-of<ErrorCode>|null $errorCode
     */
    #[Optional(enum: ErrorCode::class)]
    public ?string $errorCode;

    /**
     * A descriptive message providing additional information about the snapshot operation or error.
     */
    #[Optional]
    public ?string $message;

    /**
     * `new SnapshotStatusResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SnapshotStatusResponse::with(id: ..., initiatedAt: ..., status: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SnapshotStatusResponse)->withID(...)->withInitiatedAt(...)->withStatus(...)
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
     *
     * @param Status|value-of<Status> $status
     * @param ErrorCode|value-of<ErrorCode>|null $errorCode
     */
    public static function with(
        string $id,
        int $initiatedAt,
        Status|string $status,
        ?int $completedAt = null,
        ErrorCode|string|null $errorCode = null,
        ?string $message = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['initiatedAt'] = $initiatedAt;
        $self['status'] = $status;

        null !== $completedAt && $self['completedAt'] = $completedAt;
        null !== $errorCode && $self['errorCode'] = $errorCode;
        null !== $message && $self['message'] = $message;

        return $self;
    }

    /**
     * The unique identifier for the snapshot operation, represented as a UUID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The timestamp indicating when the snapshot operation was initiated, represented as a Unix timestamp in milliseconds.
     */
    public function withInitiatedAt(int $initiatedAt): self
    {
        $self = clone $this;
        $self['initiatedAt'] = $initiatedAt;

        return $self;
    }

    /**
     * The current status of the snapshot. Valid values include 'PENDING', 'IN_PROGRESS', 'COMPLETED', 'FAILED', and 'EXPIRED'.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * The timestamp indicating when the snapshot operation was completed, represented as a Unix timestamp in milliseconds.
     */
    public function withCompletedAt(int $completedAt): self
    {
        $self = clone $this;
        $self['completedAt'] = $completedAt;

        return $self;
    }

    /**
     * A code representing the error that occurred, if any. Possible values are 'TIMEOUT', 'VALIDATION_ERROR', 'INTERNAL_ERROR', and 'PERMISSION_DENIED'.
     *
     * @param ErrorCode|value-of<ErrorCode> $errorCode
     */
    public function withErrorCode(ErrorCode|string $errorCode): self
    {
        $self = clone $this;
        $self['errorCode'] = $errorCode;

        return $self;
    }

    /**
     * A descriptive message providing additional information about the snapshot operation or error.
     */
    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }
}
