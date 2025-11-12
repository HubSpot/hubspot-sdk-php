<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\AuditLogs;

use HubspotSDK\Cms\AuditLogs\PublicAuditLog\Event;
use HubspotSDK\Cms\AuditLogs\PublicAuditLog\ObjectType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

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
final class PublicAuditLog implements BaseModel, ResponseConverter
{
    /** @use SdkModel<PublicAuditLogShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The type of event that took place (CREATED, UPDATED, PUBLISHED, DELETED, UNPUBLISHED).
     *
     * @var value-of<Event> $event
     */
    #[Api(enum: Event::class)]
    public string $event;

    /**
     * The name of the user who caused the event.
     */
    #[Api]
    public string $fullName;

    /**
     * The ID of the object.
     */
    #[Api]
    public string $objectId;

    /**
     * The internal name of the object in HubSpot.
     */
    #[Api]
    public string $objectName;

    /**
     * The type of the object (BLOG, LANDING_PAGE, DOMAIN, HUBDB_TABLE etc.).
     *
     * @var value-of<ObjectType> $objectType
     */
    #[Api(enum: ObjectType::class)]
    public string $objectType;

    /**
     * The timestamp at which the event occurred.
     */
    #[Api]
    public \DateTimeInterface $timestamp;

    /**
     * The ID of the user who caused the event.
     */
    #[Api]
    public string $userId;

    #[Api(optional: true)]
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
        $obj->fullName = $fullName;
        $obj->objectId = $objectId;
        $obj->objectName = $objectName;
        $obj['objectType'] = $objectType;
        $obj->timestamp = $timestamp;
        $obj->userId = $userId;

        null !== $meta && $obj->meta = $meta;

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
        $obj->fullName = $fullName;

        return $obj;
    }

    /**
     * The ID of the object.
     */
    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj->objectId = $objectID;

        return $obj;
    }

    /**
     * The internal name of the object in HubSpot.
     */
    public function withObjectName(string $objectName): self
    {
        $obj = clone $this;
        $obj->objectName = $objectName;

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
        $obj->timestamp = $timestamp;

        return $obj;
    }

    /**
     * The ID of the user who caused the event.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj->userId = $userID;

        return $obj;
    }

    public function withMeta(mixed $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }
}
