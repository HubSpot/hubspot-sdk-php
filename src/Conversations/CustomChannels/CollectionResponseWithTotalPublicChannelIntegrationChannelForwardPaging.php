<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;
use HubspotSDK\NextPage;

/**
 * @phpstan-type CollectionResponseWithTotalPublicChannelIntegrationChannelForwardPagingShape = array{
 *   results: list<PublicChannelIntegrationChannel>,
 *   total: int,
 *   paging?: ForwardPaging|null,
 * }
 */
final class CollectionResponseWithTotalPublicChannelIntegrationChannelForwardPaging implements BaseModel
{
    /**
     * @use SdkModel<CollectionResponseWithTotalPublicChannelIntegrationChannelForwardPagingShape>
     */
    use SdkModel;

    /** @var list<PublicChannelIntegrationChannel> $results */
    #[Api(list: PublicChannelIntegrationChannel::class)]
    public array $results;

    #[Api]
    public int $total;

    #[Api(optional: true)]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponseWithTotalPublicChannelIntegrationChannelForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseWithTotalPublicChannelIntegrationChannelForwardPaging::with(
     *   results: ..., total: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseWithTotalPublicChannelIntegrationChannelForwardPaging)
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
     * @param list<PublicChannelIntegrationChannel|array{
     *   id: string,
     *   capabilities: array<string,mixed>,
     *   createdAt: \DateTimeInterface,
     *   name: string,
     *   channelAccountConnectionRedirectUrl?: string|null,
     *   channelDescription?: string|null,
     *   channelLogoUrl?: string|null,
     *   webhookUrl?: string|null,
     * }> $results
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public static function with(
        array $results,
        int $total,
        ForwardPaging|array|null $paging = null
    ): self {
        $obj = new self;

        $obj['results'] = $results;
        $obj['total'] = $total;

        null !== $paging && $obj['paging'] = $paging;

        return $obj;
    }

    /**
     * @param list<PublicChannelIntegrationChannel|array{
     *   id: string,
     *   capabilities: array<string,mixed>,
     *   createdAt: \DateTimeInterface,
     *   name: string,
     *   channelAccountConnectionRedirectUrl?: string|null,
     *   channelDescription?: string|null,
     *   channelLogoUrl?: string|null,
     *   webhookUrl?: string|null,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }

    public function withTotal(int $total): self
    {
        $obj = clone $this;
        $obj['total'] = $total;

        return $obj;
    }

    /**
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public function withPaging(ForwardPaging|array $paging): self
    {
        $obj = clone $this;
        $obj['paging'] = $paging;

        return $obj;
    }
}
