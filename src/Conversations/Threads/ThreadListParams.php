<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\Threads;

use HubspotSDK\Conversations\Threads\ThreadListParams\Association;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
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

    #[Api(optional: true)]
    public ?string $after;

    #[Api(optional: true)]
    public ?bool $archived;

    #[Api(optional: true)]
    public ?int $associatedContactId;

    /** @var list<value-of<Association>>|null $association */
    #[Api(list: Association::class, optional: true)]
    public ?array $association;

    /** @var list<int>|null $inboxId */
    #[Api(list: 'int', optional: true)]
    public ?array $inboxId;

    #[Api(optional: true)]
    public ?\DateTimeInterface $latestMessageTimestampAfter;

    #[Api(optional: true)]
    public ?int $limit;

    #[Api(optional: true)]
    public ?string $property;

    /** @var list<string>|null $sort */
    #[Api(list: 'string', optional: true)]
    public ?array $sort;

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

    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    public function withAssociatedContactID(int $associatedContactID): self
    {
        $obj = clone $this;
        $obj->associatedContactId = $associatedContactID;

        return $obj;
    }

    /**
     * @param list<Association|value-of<Association>> $association
     */
    public function withAssociation(array $association): self
    {
        $obj = clone $this;
        $obj['association'] = $association;

        return $obj;
    }

    /**
     * @param list<int> $inboxID
     */
    public function withInboxID(array $inboxID): self
    {
        $obj = clone $this;
        $obj->inboxId = $inboxID;

        return $obj;
    }

    public function withLatestMessageTimestampAfter(
        \DateTimeInterface $latestMessageTimestampAfter
    ): self {
        $obj = clone $this;
        $obj->latestMessageTimestampAfter = $latestMessageTimestampAfter;

        return $obj;
    }

    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    public function withProperty(string $property): self
    {
        $obj = clone $this;
        $obj->property = $property;

        return $obj;
    }

    /**
     * @param list<string> $sort
     */
    public function withSort(array $sort): self
    {
        $obj = clone $this;
        $obj->sort = $sort;

        return $obj;
    }

    public function withThreadStatus(string $threadStatus): self
    {
        $obj = clone $this;
        $obj->threadStatus = $threadStatus;

        return $obj;
    }
}
