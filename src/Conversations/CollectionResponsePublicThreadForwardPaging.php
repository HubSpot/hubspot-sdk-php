<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\PublicThread\Status;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;
use HubspotSDK\NextPage;

/**
 * @phpstan-type CollectionResponsePublicThreadForwardPagingShape = array{
 *   results: list<PublicThread>, paging?: ForwardPaging|null
 * }
 */
final class CollectionResponsePublicThreadForwardPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponsePublicThreadForwardPagingShape> */
    use SdkModel;

    /** @var list<PublicThread> $results */
    #[Required(list: PublicThread::class)]
    public array $results;

    #[Optional]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponsePublicThreadForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePublicThreadForwardPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePublicThreadForwardPaging)->withResults(...)
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
     * @param list<PublicThread|array{
     *   id: string,
     *   archived: bool,
     *   associatedContactID: string,
     *   createdAt: \DateTimeInterface,
     *   inboxID: string,
     *   originalChannelAccountID: string,
     *   originalChannelID: string,
     *   spam: bool,
     *   status: value-of<Status>,
     *   assignedTo?: string|null,
     *   closedAt?: \DateTimeInterface|null,
     *   latestMessageReceivedTimestamp?: \DateTimeInterface|null,
     *   latestMessageSentTimestamp?: \DateTimeInterface|null,
     *   latestMessageTimestamp?: \DateTimeInterface|null,
     *   threadAssociations?: PublicThreadAssociations|null,
     * }> $results
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public static function with(
        array $results,
        ForwardPaging|array|null $paging = null
    ): self {
        $self = new self;

        $self['results'] = $results;

        null !== $paging && $self['paging'] = $paging;

        return $self;
    }

    /**
     * @param list<PublicThread|array{
     *   id: string,
     *   archived: bool,
     *   associatedContactID: string,
     *   createdAt: \DateTimeInterface,
     *   inboxID: string,
     *   originalChannelAccountID: string,
     *   originalChannelID: string,
     *   spam: bool,
     *   status: value-of<Status>,
     *   assignedTo?: string|null,
     *   closedAt?: \DateTimeInterface|null,
     *   latestMessageReceivedTimestamp?: \DateTimeInterface|null,
     *   latestMessageSentTimestamp?: \DateTimeInterface|null,
     *   latestMessageTimestamp?: \DateTimeInterface|null,
     *   threadAssociations?: PublicThreadAssociations|null,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public function withPaging(ForwardPaging|array $paging): self
    {
        $self = clone $this;
        $self['paging'] = $paging;

        return $self;
    }
}
