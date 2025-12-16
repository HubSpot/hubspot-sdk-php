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
 *   event: Event|value-of<Event>,
 *   fullName: string,
 *   objectID: string,
 *   objectName: string,
 *   objectType: ObjectType|value-of<ObjectType>,
 *   timestamp: \DateTimeInterface,
 *   userID: string,
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
    #[Required('objectId')]
    public string $objectID;

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
    #[Required('userId')]
    public string $userID;

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
     *   objectID: ...,
     *   objectName: ...,
     *   objectType: ...,
     *   timestamp: ...,
     *   userID: ...,
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
        string $objectID,
        string $objectName,
        ObjectType|string $objectType,
        \DateTimeInterface $timestamp,
        string $userID,
        mixed $meta = null,
    ): self {
        $self = new self;

        $self['event'] = $event;
        $self['fullName'] = $fullName;
        $self['objectID'] = $objectID;
        $self['objectName'] = $objectName;
        $self['objectType'] = $objectType;
        $self['timestamp'] = $timestamp;
        $self['userID'] = $userID;

        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * The type of event that took place (CREATED, UPDATED, PUBLISHED, DELETED, UNPUBLISHED).
     *
     * @param Event|value-of<Event> $event
     */
    public function withEvent(Event|string $event): self
    {
        $self = clone $this;
        $self['event'] = $event;

        return $self;
    }

    /**
     * The name of the user who caused the event.
     */
    public function withFullName(string $fullName): self
    {
        $self = clone $this;
        $self['fullName'] = $fullName;

        return $self;
    }

    /**
     * The ID of the object.
     */
    public function withObjectID(string $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

        return $self;
    }

    /**
     * The internal name of the object in HubSpot.
     */
    public function withObjectName(string $objectName): self
    {
        $self = clone $this;
        $self['objectName'] = $objectName;

        return $self;
    }

    /**
     * The type of the object (BLOG, LANDING_PAGE, DOMAIN, HUBDB_TABLE etc.).
     *
     * @param ObjectType|value-of<ObjectType> $objectType
     */
    public function withObjectType(ObjectType|string $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

        return $self;
    }

    /**
     * The timestamp at which the event occurred.
     */
    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }

    /**
     * The ID of the user who caused the event.
     */
    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    /**
     * Supplementary metadata associated with the audit log entry. It provides additional context about the audited event (ex: rows deleted/updated for a HubDB event, the specific fields that were changed for a Content Settings event).
     */
    public function withMeta(mixed $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
