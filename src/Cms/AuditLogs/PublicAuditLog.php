<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\AuditLogs;

use HubspotSDK\Cms\AuditLogs\PublicAuditLog\Event;
use HubspotSDK\Cms\AuditLogs\PublicAuditLog\ObjectType;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicAuditLogShape = array{
 *   event: value-of<Event>,
 *   fullName: string,
 *   objectId: string,
 *   objectName: string,
 *   objectType: value-of<ObjectType>,
 *   timestamp: \DateTimeInterface,
 *   userId: string,
 *   meta?: mixed,
 * }
 */
final class PublicAuditLog implements BaseModel
{
    /** @use SdkModel<PublicAuditLogShape> */
    use SdkModel;

    /**
     * The type of event that took place (CREATED, UPDATED, PUBLISHED, DELETED, UNPUBLISHED).
     *
     * @var value-of<Event> $event
     */
    #[Required(enum: Event::class)]
    public string $event;

    /**
     * The name of the user who caused the event.
     */
    #[Required]
    public string $fullName;

    /**
     * The ID of the object.
     */
    #[Required]
    public string $objectId;

    /**
     * The internal name of the object in HubSpot.
     */
    #[Required]
    public string $objectName;

    /**
     * The type of the object (BLOG, LANDING_PAGE, DOMAIN, HUBDB_TABLE etc.).
     *
     * @var value-of<ObjectType> $objectType
     */
    #[Required(enum: ObjectType::class)]
    public string $objectType;

    /**
     * The timestamp at which the event occurred.
     */
    #[Required]
    public \DateTimeInterface $timestamp;

    /**
     * The ID of the user who caused the event.
     */
    #[Required]
    public string $userId;

    /**
     * Supplementary metadata associated with the audit log entry. It provides additional context about the audited event (ex: rows deleted/updated for a HubDB event, the specific fields that were changed for a Content Settings event).
     */
    #[Optional]
    public mixed $meta;

    /**
     * `new PublicAuditLog()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAuditLog::with(
     *   event: ...,
     *   fullName: ...,
     *   objectId: ...,
     *   objectName: ...,
     *   objectType: ...,
     *   timestamp: ...,
     *   userId: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAuditLog)
     *   ->withEvent(...)
     *   ->withFullName(...)
     *   ->withObjectID(...)
     *   ->withObjectName(...)
     *   ->withObjectType(...)
     *   ->withTimestamp(...)
     *   ->withUserID(...)
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
     * @param Event|value-of<Event> $event
     * @param ObjectType|value-of<ObjectType> $objectType
     */
    public static function with(
        Event|string $event,
        string $fullName,
        string $objectId,
        string $objectName,
        ObjectType|string $objectType,
        \DateTimeInterface $timestamp,
        string $userId,
        mixed $meta = null,
    ): self {
        $obj = new self;

        $obj['event'] = $event;
        $obj['fullName'] = $fullName;
        $obj['objectId'] = $objectId;
        $obj['objectName'] = $objectName;
        $obj['objectType'] = $objectType;
        $obj['timestamp'] = $timestamp;
        $obj['userId'] = $userId;

        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * The type of event that took place (CREATED, UPDATED, PUBLISHED, DELETED, UNPUBLISHED).
     *
     * @param Event|value-of<Event> $event
     */
    public function withEvent(Event|string $event): self
    {
        $obj = clone $this;
        $obj['event'] = $event;

        return $obj;
    }

    /**
     * The name of the user who caused the event.
     */
    public function withFullName(string $fullName): self
    {
        $obj = clone $this;
        $obj['fullName'] = $fullName;

        return $obj;
    }

    /**
     * The ID of the object.
     */
    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj['objectId'] = $objectID;

        return $obj;
    }

    /**
     * The internal name of the object in HubSpot.
     */
    public function withObjectName(string $objectName): self
    {
        $obj = clone $this;
        $obj['objectName'] = $objectName;

        return $obj;
    }

    /**
     * The type of the object (BLOG, LANDING_PAGE, DOMAIN, HUBDB_TABLE etc.).
     *
     * @param ObjectType|value-of<ObjectType> $objectType
     */
    public function withObjectType(ObjectType|string $objectType): self
    {
        $obj = clone $this;
        $obj['objectType'] = $objectType;

        return $obj;
    }

    /**
     * The timestamp at which the event occurred.
     */
    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $obj = clone $this;
        $obj['timestamp'] = $timestamp;

        return $obj;
    }

    /**
     * The ID of the user who caused the event.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['userId'] = $userID;

        return $obj;
    }

    /**
     * Supplementary metadata associated with the audit log entry. It provides additional context about the audited event (ex: rows deleted/updated for a HubDB event, the specific fields that were changed for a Content Settings event).
     */
    public function withMeta(mixed $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
