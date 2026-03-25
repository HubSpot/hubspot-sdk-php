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
 *   portalID: int,
 *   fromUserID?: int|null,
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
    #[Required('portalId')]
    public int $portalID;

    /**
     * The ID of the user who initiated the audit event.
     */
    #[Optional('fromUserId')]
    public ?int $fromUserID;

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
     * PublicAuditInfo::with(action: ..., identifier: ..., portalID: ...)
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
        int $portalID,
        ?int $fromUserID = null,
        ?string $message = null,
        mixed $rawObject = null,
        ?\DateTimeInterface $timestamp = null,
    ): self {
        $self = new self;

        $self['action'] = $action;
        $self['identifier'] = $identifier;
        $self['portalID'] = $portalID;

        null !== $fromUserID && $self['fromUserID'] = $fromUserID;
        null !== $message && $self['message'] = $message;
        null !== $rawObject && $self['rawObject'] = $rawObject;
        null !== $timestamp && $self['timestamp'] = $timestamp;

        return $self;
    }

    /**
     * The action performed that triggered the audit event.
     */
    public function withAction(string $action): self
    {
        $self = clone $this;
        $self['action'] = $action;

        return $self;
    }

    /**
     * A unique string identifier for the audit event.
     */
    public function withIdentifier(string $identifier): self
    {
        $self = clone $this;
        $self['identifier'] = $identifier;

        return $self;
    }

    /**
     * The unique identifier for the HubSpot portal where the audit event occurred.
     */
    public function withPortalID(int $portalID): self
    {
        $self = clone $this;
        $self['portalID'] = $portalID;

        return $self;
    }

    /**
     * The ID of the user who initiated the audit event.
     */
    public function withFromUserID(int $fromUserID): self
    {
        $self = clone $this;
        $self['fromUserID'] = $fromUserID;

        return $self;
    }

    /**
     * A descriptive message related to the audit event.
     */
    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    /**
     * An object containing the raw data associated with the audit event.
     */
    public function withRawObject(mixed $rawObject): self
    {
        $self = clone $this;
        $self['rawObject'] = $rawObject;

        return $self;
    }

    /**
     * The date and time when the audit event took place.
     */
    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }
}
