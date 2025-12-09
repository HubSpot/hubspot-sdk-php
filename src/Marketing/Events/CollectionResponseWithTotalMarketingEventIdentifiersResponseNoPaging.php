<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CollectionResponseWithTotalMarketingEventIdentifiersResponseNoPagingShape = array{
 *   results: list<MarketingEventIdentifiersResponse>, total: int
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
     * @param list<MarketingEventIdentifiersResponse|array{
     *   externalEventId: string,
     *   marketingEventName: string,
     *   objectId: string,
     *   appInfo?: AppInfo|null,
     *   externalAccountId?: string|null,
     * }> $results
     */
    public static function with(array $results, int $total): self
    {
        $obj = new self;

        $obj['results'] = $results;
        $obj['total'] = $total;

        return $obj;
    }

    /**
     * @param list<MarketingEventIdentifiersResponse|array{
     *   externalEventId: string,
     *   marketingEventName: string,
     *   objectId: string,
     *   appInfo?: AppInfo|null,
     *   externalAccountId?: string|null,
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
}
