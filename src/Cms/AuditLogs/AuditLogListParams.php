<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\AuditLogs;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Returns audit logs based on filters.
 *
 * @see HubspotSDK\Cms\AuditLogs->list
 *
 * @phpstan-type AuditLogListParamsShape = array{
 *   after?: string,
 *   before?: string,
 *   eventType?: list<string>,
 *   limit?: int,
 *   objectId?: list<string>,
 *   objectType?: list<string>,
 *   sort?: list<string>,
 *   userId?: list<string>,
 * }
 */
final class AuditLogListParams implements BaseModel
{
    /** @use SdkModel<AuditLogListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Timestamp after which audit logs will be returned.
     */
    #[Api(optional: true)]
    public ?string $after;

    /**
     * Timestamp before which audit logs will be returned.
     */
    #[Api(optional: true)]
    public ?string $before;

    /**
     * Comma separated list of event types to filter by (CREATED, UPDATED, PUBLISHED, DELETED, UNPUBLISHED).
     *
     * @var list<string>|null $eventType
     */
    #[Api(list: 'string', optional: true)]
    public ?array $eventType;

    /**
     * The number of logs to return.
     */
    #[Api(optional: true)]
    public ?int $limit;

    /**
     * Comma separated list of object ids to filter by.
     *
     * @var list<string>|null $objectId
     */
    #[Api(list: 'string', optional: true)]
    public ?array $objectId;

    /**
     * Comma separated list of object types to filter by (BLOG, LANDING_PAGE, DOMAIN, HUBDB_TABLE etc.).
     *
     * @var list<string>|null $objectType
     */
    #[Api(list: 'string', optional: true)]
    public ?array $objectType;

    /**
     * The sort direction for the audit logs. (Can only sort by timestamp).
     *
     * @var list<string>|null $sort
     */
    #[Api(list: 'string', optional: true)]
    public ?array $sort;

    /**
     * Comma separated list of user ids to filter by.
     *
     * @var list<string>|null $userId
     */
    #[Api(list: 'string', optional: true)]
    public ?array $userId;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $eventType
     * @param list<string> $objectId
     * @param list<string> $objectType
     * @param list<string> $sort
     * @param list<string> $userId
     */
    public static function with(
        ?string $after = null,
        ?string $before = null,
        ?array $eventType = null,
        ?int $limit = null,
        ?array $objectId = null,
        ?array $objectType = null,
        ?array $sort = null,
        ?array $userId = null,
    ): self {
        $obj = new self;

        null !== $after && $obj->after = $after;
        null !== $before && $obj->before = $before;
        null !== $eventType && $obj->eventType = $eventType;
        null !== $limit && $obj->limit = $limit;
        null !== $objectId && $obj->objectId = $objectId;
        null !== $objectType && $obj->objectType = $objectType;
        null !== $sort && $obj->sort = $sort;
        null !== $userId && $obj->userId = $userId;

        return $obj;
    }

    /**
     * Timestamp after which audit logs will be returned.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    /**
     * Timestamp before which audit logs will be returned.
     */
    public function withBefore(string $before): self
    {
        $obj = clone $this;
        $obj->before = $before;

        return $obj;
    }

    /**
     * Comma separated list of event types to filter by (CREATED, UPDATED, PUBLISHED, DELETED, UNPUBLISHED).
     *
     * @param list<string> $eventType
     */
    public function withEventType(array $eventType): self
    {
        $obj = clone $this;
        $obj->eventType = $eventType;

        return $obj;
    }

    /**
     * The number of logs to return.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    /**
     * Comma separated list of object ids to filter by.
     *
     * @param list<string> $objectID
     */
    public function withObjectID(array $objectID): self
    {
        $obj = clone $this;
        $obj->objectId = $objectID;

        return $obj;
    }

    /**
     * Comma separated list of object types to filter by (BLOG, LANDING_PAGE, DOMAIN, HUBDB_TABLE etc.).
     *
     * @param list<string> $objectType
     */
    public function withObjectType(array $objectType): self
    {
        $obj = clone $this;
        $obj->objectType = $objectType;

        return $obj;
    }

    /**
     * The sort direction for the audit logs. (Can only sort by timestamp).
     *
     * @param list<string> $sort
     */
    public function withSort(array $sort): self
    {
        $obj = clone $this;
        $obj->sort = $sort;

        return $obj;
    }

    /**
     * Comma separated list of user ids to filter by.
     *
     * @param list<string> $userID
     */
    public function withUserID(array $userID): self
    {
        $obj = clone $this;
        $obj->userId = $userID;

        return $obj;
    }
}
