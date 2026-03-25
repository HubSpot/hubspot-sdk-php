<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\AuditLogs;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Cms\AuditLogsService::list()
 *
 * @phpstan-type AuditLogListParamsShape = array{
 *   after?: string|null,
 *   before?: string|null,
 *   eventType?: list<string>|null,
 *   limit?: int|null,
 *   objectID?: list<string>|null,
 *   objectType?: list<string>|null,
 *   sort?: list<string>|null,
 *   userID?: list<string>|null,
 * }
 */
final class AuditLogListParams implements BaseModel
{
    /** @use SdkModel<AuditLogListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Optional]
    public ?string $after;

    #[Optional]
    public ?string $before;

    /** @var list<string>|null $eventType */
    #[Optional(list: 'string')]
    public ?array $eventType;

    /**
     * The maximum number of results to display per page.
     */
    #[Optional]
    public ?int $limit;

    /** @var list<string>|null $objectID */
    #[Optional(list: 'string')]
    public ?array $objectID;

    /** @var list<string>|null $objectType */
    #[Optional(list: 'string')]
    public ?array $objectType;

    /** @var list<string>|null $sort */
    #[Optional(list: 'string')]
    public ?array $sort;

    /** @var list<string>|null $userID */
    #[Optional(list: 'string')]
    public ?array $userID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $eventType
     * @param list<string>|null $objectID
     * @param list<string>|null $objectType
     * @param list<string>|null $sort
     * @param list<string>|null $userID
     */
    public static function with(
        ?string $after = null,
        ?string $before = null,
        ?array $eventType = null,
        ?int $limit = null,
        ?array $objectID = null,
        ?array $objectType = null,
        ?array $sort = null,
        ?array $userID = null,
    ): self {
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $before && $self['before'] = $before;
        null !== $eventType && $self['eventType'] = $eventType;
        null !== $limit && $self['limit'] = $limit;
        null !== $objectID && $self['objectID'] = $objectID;
        null !== $objectType && $self['objectType'] = $objectType;
        null !== $sort && $self['sort'] = $sort;
        null !== $userID && $self['userID'] = $userID;

        return $self;
    }

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    public function withBefore(string $before): self
    {
        $self = clone $this;
        $self['before'] = $before;

        return $self;
    }

    /**
     * @param list<string> $eventType
     */
    public function withEventType(array $eventType): self
    {
        $self = clone $this;
        $self['eventType'] = $eventType;

        return $self;
    }

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * @param list<string> $objectID
     */
    public function withObjectID(array $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

        return $self;
    }

    /**
     * @param list<string> $objectType
     */
    public function withObjectType(array $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

        return $self;
    }

    /**
     * @param list<string> $sort
     */
    public function withSort(array $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }

    /**
     * @param list<string> $userID
     */
    public function withUserID(array $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }
}
