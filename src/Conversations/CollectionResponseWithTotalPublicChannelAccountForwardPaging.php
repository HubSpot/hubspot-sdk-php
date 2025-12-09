<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;
use HubspotSDK\NextPage;

/**
 * @phpstan-type CollectionResponseWithTotalPublicChannelAccountForwardPagingShape = array{
 *   results: list<PublicChannelAccount>, total: int, paging?: ForwardPaging|null
 * }
 */
final class CollectionResponseWithTotalPublicChannelAccountForwardPaging implements BaseModel
{
    /**
     * @use SdkModel<CollectionResponseWithTotalPublicChannelAccountForwardPagingShape>
     */
    use SdkModel;

    /** @var list<PublicChannelAccount> $results */
    #[Required(list: PublicChannelAccount::class)]
    public array $results;

    #[Required]
    public int $total;

    #[Optional]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponseWithTotalPublicChannelAccountForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseWithTotalPublicChannelAccountForwardPaging::with(
     *   results: ..., total: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseWithTotalPublicChannelAccountForwardPaging)
     *   ->withResults(...)
     *   ->withTotal(...)
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
     * @param list<PublicChannelAccount|array{
     *   id: string,
     *   active: bool,
     *   archived: bool,
     *   authorized: bool,
     *   channelID: string,
     *   createdAt: \DateTimeInterface,
     *   inboxID: string,
     *   name: string,
     *   archivedAt?: \DateTimeInterface|null,
     *   deliveryIdentifier?: PublicDeliveryIdentifier|null,
     * }> $results
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public static function with(
        array $results,
        int $total,
        ForwardPaging|array|null $paging = null
    ): self {
        $self = new self;

        $self['results'] = $results;
        $self['total'] = $total;

        null !== $paging && $self['paging'] = $paging;

        return $self;
    }

    /**
     * @param list<PublicChannelAccount|array{
     *   id: string,
     *   active: bool,
     *   archived: bool,
     *   authorized: bool,
     *   channelID: string,
     *   createdAt: \DateTimeInterface,
     *   inboxID: string,
     *   name: string,
     *   archivedAt?: \DateTimeInterface|null,
     *   deliveryIdentifier?: PublicDeliveryIdentifier|null,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

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
