<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks\Webhooks;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Webhooks\Webhooks\SnapshotStatusResponse\ErrorCode;
use HubspotSDK\Webhooks\Webhooks\SnapshotStatusResponse\Status;

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

    #[Required]
    public string $id;

    #[Required]
    public int $initiatedAt;

    /** @var value-of<Status> $status */
    #[Required(enum: Status::class)]
    public string $status;

    #[Optional]
    public ?int $completedAt;

    /** @var value-of<ErrorCode>|null $errorCode */
    #[Optional(enum: ErrorCode::class)]
    public ?string $errorCode;

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

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withInitiatedAt(int $initiatedAt): self
    {
        $self = clone $this;
        $self['initiatedAt'] = $initiatedAt;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withCompletedAt(int $completedAt): self
    {
        $self = clone $this;
        $self['completedAt'] = $completedAt;

        return $self;
    }

    /**
     * @param ErrorCode|value-of<ErrorCode> $errorCode
     */
    public function withErrorCode(ErrorCode|string $errorCode): self
    {
        $self = clone $this;
        $self['errorCode'] = $errorCode;

        return $self;
    }

    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }
}
