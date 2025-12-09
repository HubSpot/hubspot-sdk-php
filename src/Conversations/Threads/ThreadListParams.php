<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\Threads;

use HubspotSDK\Conversations\Threads\ThreadListParams\Association;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Conversations\ThreadsService::list()
 *
 * @phpstan-type ThreadListParamsShape = array{
 *   after?: string,
 *   archived?: bool,
 *   associatedContactID?: int,
 *   association?: list<Association|value-of<Association>>,
 *   inboxID?: list<int>,
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

    #[Optional]
    public ?string $after;

    #[Optional]
    public ?bool $archived;

    #[Optional]
    public ?int $associatedContactID;

    /** @var list<value-of<Association>>|null $association */
    #[Optional(list: Association::class)]
    public ?array $association;

    /** @var list<int>|null $inboxID */
    #[Optional(list: 'int')]
    public ?array $inboxID;

    #[Optional]
    public ?\DateTimeInterface $latestMessageTimestampAfter;

    #[Optional]
    public ?int $limit;

    #[Optional]
    public ?string $property;

    /** @var list<string>|null $sort */
    #[Optional(list: 'string')]
    public ?array $sort;

    #[Optional]
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
     * @param list<int> $inboxID
     * @param list<string> $sort
     */
    public static function with(
        ?string $after = null,
        ?bool $archived = null,
        ?int $associatedContactID = null,
        ?array $association = null,
        ?array $inboxID = null,
        ?\DateTimeInterface $latestMessageTimestampAfter = null,
        ?int $limit = null,
        ?string $property = null,
        ?array $sort = null,
        ?string $threadStatus = null,
    ): self {
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $archived && $self['archived'] = $archived;
        null !== $associatedContactID && $self['associatedContactID'] = $associatedContactID;
        null !== $association && $self['association'] = $association;
        null !== $inboxID && $self['inboxID'] = $inboxID;
        null !== $latestMessageTimestampAfter && $self['latestMessageTimestampAfter'] = $latestMessageTimestampAfter;
        null !== $limit && $self['limit'] = $limit;
        null !== $property && $self['property'] = $property;
        null !== $sort && $self['sort'] = $sort;
        null !== $threadStatus && $self['threadStatus'] = $threadStatus;

        return $self;
    }

    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    public function withAssociatedContactID(int $associatedContactID): self
    {
        $self = clone $this;
        $self['associatedContactID'] = $associatedContactID;

        return $self;
    }

    /**
     * @param list<Association|value-of<Association>> $association
     */
    public function withAssociation(array $association): self
    {
        $self = clone $this;
        $self['association'] = $association;

        return $self;
    }

    /**
     * @param list<int> $inboxID
     */
    public function withInboxID(array $inboxID): self
    {
        $self = clone $this;
        $self['inboxID'] = $inboxID;

        return $self;
    }

    public function withLatestMessageTimestampAfter(
        \DateTimeInterface $latestMessageTimestampAfter
    ): self {
        $self = clone $this;
        $self['latestMessageTimestampAfter'] = $latestMessageTimestampAfter;

        return $self;
    }

    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    public function withProperty(string $property): self
    {
        $self = clone $this;
        $self['property'] = $property;

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

    public function withThreadStatus(string $threadStatus): self
    {
        $self = clone $this;
        $self['threadStatus'] = $threadStatus;

        return $self;
    }
}
