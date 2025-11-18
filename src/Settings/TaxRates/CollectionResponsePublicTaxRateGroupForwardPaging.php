<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\TaxRates;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;

/**
 * @phpstan-type CollectionResponsePublicTaxRateGroupForwardPagingShape = array{
 *   results: list<PublicTaxRateGroup>, paging?: ForwardPaging|null
 * }
 */
final class CollectionResponsePublicTaxRateGroupForwardPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponsePublicTaxRateGroupForwardPagingShape> */
    use SdkModel;

    /** @var list<PublicTaxRateGroup> $results */
    #[Api(list: PublicTaxRateGroup::class)]
    public array $results;

    #[Api(optional: true)]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponsePublicTaxRateGroupForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePublicTaxRateGroupForwardPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePublicTaxRateGroupForwardPaging)->withResults(...)
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
     * @param list<PublicTaxRateGroup> $results
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
     * @param list<PublicTaxRateGroup> $results
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
