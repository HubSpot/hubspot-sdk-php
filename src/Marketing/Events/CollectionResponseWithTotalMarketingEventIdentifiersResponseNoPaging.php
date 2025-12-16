<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MarketingEventIdentifiersResponseShape from \HubspotSDK\Marketing\Events\MarketingEventIdentifiersResponse
 *
 * @phpstan-type CollectionResponseWithTotalMarketingEventIdentifiersResponseNoPagingShape = array{
 *   results: list<MarketingEventIdentifiersResponseShape>, total: int
 * }
 */
final class CollectionResponseWithTotalMarketingEventIdentifiersResponseNoPaging implements BaseModel
{
    /**
     * @use SdkModel<CollectionResponseWithTotalMarketingEventIdentifiersResponseNoPagingShape>
     */
    use SdkModel;

    /** @var list<MarketingEventIdentifiersResponse> $results */
    #[Required(list: MarketingEventIdentifiersResponse::class)]
    public array $results;

    #[Required]
    public int $total;

    /**
     * `new CollectionResponseWithTotalMarketingEventIdentifiersResponseNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseWithTotalMarketingEventIdentifiersResponseNoPaging::with(
     *   results: ..., total: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseWithTotalMarketingEventIdentifiersResponseNoPaging)
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
     * @param list<MarketingEventIdentifiersResponseShape> $results
     */
    public static function with(array $results, int $total): self
    {
        $self = new self;

        $self['results'] = $results;
        $self['total'] = $total;

        return $self;
    }

    /**
     * @param list<MarketingEventIdentifiersResponseShape> $results
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
}
