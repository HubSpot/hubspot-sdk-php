<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Pipelines;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicAuditInfoShape = array{
 *   action: string,
 *   identifier: string,
 *   portalId: int,
 *   fromUserId?: int|null,
 *   message?: string|null,
 *   rawObject?: mixed,
 *   timestamp?: \DateTimeInterface|null,
 * }
 */
final class PublicAuditInfo implements BaseModel
{
    /** @use SdkModel<PublicAuditInfoShape> */
    use SdkModel;

    /**
     * The action performed that triggered the audit event.
     */
    #[Required]
    public string $action;

    /**
     * A unique string identifier for the audit event.
     */
    #[Required]
    public string $identifier;

    /**
     * The unique identifier for the HubSpot portal where the audit event occurred.
     */
    #[Required]
    public int $portalId;

    /**
     * The ID of the user who initiated the audit event.
     */
    #[Optional]
    public ?int $fromUserId;

    /**
     * A descriptive message related to the audit event.
     */
    #[Optional]
    public ?string $message;

    /**
     * An object containing the raw data associated with the audit event.
     */
    #[Optional]
    public mixed $rawObject;

    /**
     * The date and time when the audit event took place.
     */
    #[Optional]
    public ?\DateTimeInterface $timestamp;

    /**
     * `new PublicAuditInfo()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAuditInfo::with(action: ..., identifier: ..., portalId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAuditInfo)->withAction(...)->withIdentifier(...)->withPortalID(...)
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
        string $action,
        string $identifier,
        int $portalId,
        ?int $fromUserId = null,
        ?string $message = null,
        mixed $rawObject = null,
        ?\DateTimeInterface $timestamp = null,
    ): self {
        $obj = new self;

        $obj['action'] = $action;
        $obj['identifier'] = $identifier;
        $obj['portalId'] = $portalId;

        null !== $fromUserId && $obj['fromUserId'] = $fromUserId;
        null !== $message && $obj['message'] = $message;
        null !== $rawObject && $obj['rawObject'] = $rawObject;
        null !== $timestamp && $obj['timestamp'] = $timestamp;

        return $obj;
    }

    /**
     * The action performed that triggered the audit event.
     */
    public function withAction(string $action): self
    {
        $obj = clone $this;
        $obj['action'] = $action;

        return $obj;
    }

    /**
     * A unique string identifier for the audit event.
     */
    public function withIdentifier(string $identifier): self
    {
        $obj = clone $this;
        $obj['identifier'] = $identifier;

        return $obj;
    }

    /**
     * The unique identifier for the HubSpot portal where the audit event occurred.
     */
    public function withPortalID(int $portalID): self
    {
        $obj = clone $this;
        $obj['portalId'] = $portalID;

        return $obj;
    }

    /**
     * The ID of the user who initiated the audit event.
     */
    public function withFromUserID(int $fromUserID): self
    {
        $obj = clone $this;
        $obj['fromUserId'] = $fromUserID;

        return $obj;
    }

    /**
     * A descriptive message related to the audit event.
     */
    public function withMessage(string $message): self
    {
        $obj = clone $this;
        $obj['message'] = $message;

        return $obj;
    }

    /**
     * An object containing the raw data associated with the audit event.
     */
    public function withRawObject(mixed $rawObject): self
    {
        $obj = clone $this;
        $obj['rawObject'] = $rawObject;

        return $obj;
    }

    /**
     * The date and time when the audit event took place.
     */
    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $obj = clone $this;
        $obj['timestamp'] = $timestamp;

        return $obj;
    }
}
