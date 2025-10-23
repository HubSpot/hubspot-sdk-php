<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\MarketingEvents;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;

/**
 * @phpstan-type collection_response_marketing_event_public_read_response_v2_forward_paging = array{
 *   results: list<MarketingEventPublicReadResponseV2>, paging?: ForwardPaging
 * }
 */
final class CollectionResponseMarketingEventPublicReadResponseV2ForwardPaging implements BaseModel
{
    /**
     * @use SdkModel<collection_response_marketing_event_public_read_response_v2_forward_paging>
     */
    use SdkModel;

    /** @var list<MarketingEventPublicReadResponseV2> $results */
    #[Api(list: MarketingEventPublicReadResponseV2::class)]
    public array $results;

    #[Api(optional: true)]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponseMarketingEventPublicReadResponseV2ForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseMarketingEventPublicReadResponseV2ForwardPaging::with(
     *   results: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseMarketingEventPublicReadResponseV2ForwardPaging)
     *   ->withResults(...)
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
     * @param list<MarketingEventPublicReadResponseV2> $results
     */
    public static function with(
        array $results,
        ?ForwardPaging $paging = null
    ): self {
        $obj = new self;

        $obj->results = $results;

        null !== $paging && $obj->paging = $paging;

        return $obj;
    }

    /**
     * @param list<MarketingEventPublicReadResponseV2> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    public function withPaging(ForwardPaging $paging): self
    {
        $obj = clone $this;
        $obj->paging = $paging;

        return $obj;
    }
}
