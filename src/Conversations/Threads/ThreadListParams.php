<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\Threads;

use HubspotSDK\Conversations\Threads\ThreadListParams\Association;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a list of threads, with optional filters and sorting.
 *
 * @see HubspotSDK\Services\Conversations\ThreadsService::list()
 *
 * @phpstan-type ThreadListParamsShape = array{
 *   after?: string,
 *   archived?: bool,
 *   associatedContactId?: int,
 *   association?: list<Association|value-of<Association>>,
 *   inboxId?: list<int>,
 *   latestMessageTimestampAfter?: \DateTimeInterface,
 *   limit?: int,
 *   property?: string,
 *   sort?: list<string>,
 *   threadStatus?: string,
 * }
 */
final class ThreadListParams implements BaseModel
{
    /** @use SdkModel<ThreadListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Api(optional: true)]
    public ?string $after;

    /**
     * Whether to return only results that have been archived.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * Retrieve a filtered list of conversations for a specific contact by its ID. This parameter cannot be used in conjunction with the `inboxId` property.
     */
    #[Api(optional: true)]
    public ?int $associatedContactId;

    /**
     * You can specify an association type here of `TICKET`. If this is set the response will included a thread associations object and associated ticket id if present. If there are no associations to a ticket with this conversation, then the thread associations object will not be present on the response.
     *
     * @var list<value-of<Association>>|null $association
     */
    #[Api(list: Association::class, optional: true)]
    public ?array $association;

    /**
     * The ID of the conversations inbox you can optionally include to retrieve the associated messages for. This parameter cannot be used in conjunction with the `associatedContactId` property.
     *
     * @var list<int>|null $inboxId
     */
    #[Api(list: 'int', optional: true)]
    public ?array $inboxId;

    /**
     * The minimum(earliest) `latestMessageTimestamp`. This is required only when sorting by `latestMessageTimestamp`.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $latestMessageTimestampAfter;

    /**
     * The maximum number of results to display per page.
     */
    #[Api(optional: true)]
    public ?int $limit;

    /**
     * A specific property to include in the thread response.
     */
    #[Api(optional: true)]
    public ?string $property;

    /**
     * Set the sort order of the response. Valid options are `id` (default) and `latestMessageTimestamp` (which requires the `latestMessageTimestampAfter` field to also be set). If you’re filtering threads by `associatedContactId` , you can sort in descending order by prepending - to the sort option (e.g., `-id` or `-latestMessageTimestampAfter` ). Otherwise, results are always returned in ascending order.
     *
     * @var list<string>|null $sort
     */
    #[Api(list: 'string', optional: true)]
    public ?array $sort;

    /**
     * The status of the associated conversations to filter by (either `OPEN` or `CLOSED`). This property must be provided if you’re including the `associatedContactId` query parameter.
     */
    #[Api(optional: true)]
    public ?string $threadStatus;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Association|value-of<Association>> $association
     * @param list<int> $inboxId
     * @param list<string> $sort
     */
    public static function with(
        ?string $after = null,
        ?bool $archived = null,
        ?int $associatedContactId = null,
        ?array $association = null,
        ?array $inboxId = null,
        ?\DateTimeInterface $latestMessageTimestampAfter = null,
        ?int $limit = null,
        ?string $property = null,
        ?array $sort = null,
        ?string $threadStatus = null,
    ): self {
        $obj = new self;

        null !== $after && $obj->after = $after;
        null !== $archived && $obj->archived = $archived;
        null !== $associatedContactId && $obj->associatedContactId = $associatedContactId;
        null !== $association && $obj['association'] = $association;
        null !== $inboxId && $obj->inboxId = $inboxId;
        null !== $latestMessageTimestampAfter && $obj->latestMessageTimestampAfter = $latestMessageTimestampAfter;
        null !== $limit && $obj->limit = $limit;
        null !== $property && $obj->property = $property;
        null !== $sort && $obj->sort = $sort;
        null !== $threadStatus && $obj->threadStatus = $threadStatus;

        return $obj;
    }

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    /**
     * Whether to return only results that have been archived.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    /**
     * Retrieve a filtered list of conversations for a specific contact by its ID. This parameter cannot be used in conjunction with the `inboxId` property.
     */
    public function withAssociatedContactID(int $associatedContactID): self
    {
        $obj = clone $this;
        $obj->associatedContactId = $associatedContactID;

        return $obj;
    }

    /**
     * You can specify an association type here of `TICKET`. If this is set the response will included a thread associations object and associated ticket id if present. If there are no associations to a ticket with this conversation, then the thread associations object will not be present on the response.
     *
     * @param list<Association|value-of<Association>> $association
     */
    public function withAssociation(array $association): self
    {
        $obj = clone $this;
        $obj['association'] = $association;

        return $obj;
    }

    /**
     * The ID of the conversations inbox you can optionally include to retrieve the associated messages for. This parameter cannot be used in conjunction with the `associatedContactId` property.
     *
     * @param list<int> $inboxID
     */
    public function withInboxID(array $inboxID): self
    {
        $obj = clone $this;
        $obj->inboxId = $inboxID;

        return $obj;
    }

    /**
     * The minimum(earliest) `latestMessageTimestamp`. This is required only when sorting by `latestMessageTimestamp`.
     */
    public function withLatestMessageTimestampAfter(
        \DateTimeInterface $latestMessageTimestampAfter
    ): self {
        $obj = clone $this;
        $obj->latestMessageTimestampAfter = $latestMessageTimestampAfter;

        return $obj;
    }

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    /**
     * A specific property to include in the thread response.
     */
    public function withProperty(string $property): self
    {
        $obj = clone $this;
        $obj->property = $property;

        return $obj;
    }

    /**
     * Set the sort order of the response. Valid options are `id` (default) and `latestMessageTimestamp` (which requires the `latestMessageTimestampAfter` field to also be set). If you’re filtering threads by `associatedContactId` , you can sort in descending order by prepending - to the sort option (e.g., `-id` or `-latestMessageTimestampAfter` ). Otherwise, results are always returned in ascending order.
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
     * The status of the associated conversations to filter by (either `OPEN` or `CLOSED`). This property must be provided if you’re including the `associatedContactId` query parameter.
     */
    public function withThreadStatus(string $threadStatus): self
    {
        $obj = clone $this;
        $obj->threadStatus = $threadStatus;

        return $obj;
    }
}
