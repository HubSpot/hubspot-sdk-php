<?php

declare(strict_types=1);

namespace HubSpotSDK\Conversations\CustomChannels;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Paging;

/**
 * @phpstan-import-type PublicChannelIntegrationChannelShape from \HubSpotSDK\Conversations\CustomChannels\PublicChannelIntegrationChannel
 * @phpstan-import-type PagingShape from \HubSpotSDK\Paging
 *
 * @phpstan-type CollectionResponseWithTotalPublicChannelIntegrationChannelShape = array{
 *   results: list<PublicChannelIntegrationChannel|PublicChannelIntegrationChannelShape>,
 *   total: int,
 *   paging?: null|Paging|PagingShape,
 * }
 */
final class CollectionResponseWithTotalPublicChannelIntegrationChannel implements BaseModel
{
    /** @use SdkModel<CollectionResponseWithTotalPublicChannelIntegrationChannelShape> */
    use SdkModel;

    /** @var list<PublicChannelIntegrationChannel> $results */
    #[Required(list: PublicChannelIntegrationChannel::class)]
    public array $results;

    #[Required]
    public int $total;

    #[Optional]
    public ?Paging $paging;

    /**
     * `new CollectionResponseWithTotalPublicChannelIntegrationChannel()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseWithTotalPublicChannelIntegrationChannel::with(
     *   results: ..., total: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseWithTotalPublicChannelIntegrationChannel)
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
     * @param list<PublicChannelIntegrationChannel|PublicChannelIntegrationChannelShape> $results
     * @param Paging|PagingShape|null $paging
     */
    public static function with(
        array $results,
        int $total,
        Paging|array|null $paging = null
    ): self {
        $self = new self;

        $self['results'] = $results;
        $self['total'] = $total;

        null !== $paging && $self['paging'] = $paging;

        return $self;
    }

    /**
     * @param list<PublicChannelIntegrationChannel|PublicChannelIntegrationChannelShape> $results
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
     * @param Paging|PagingShape $paging
     */
    public function withPaging(Paging|array $paging): self
    {
        $self = clone $this;
        $self['paging'] = $paging;

        return $self;
    }
}
