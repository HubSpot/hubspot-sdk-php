<?php

declare(strict_types=1);

namespace HubspotSDK\Account;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Emails\MarketingEmailsPaging;

/**
 * @phpstan-type collection_response_api_usage = array{
 *   results: list<APIUsage>, paging?: MarketingEmailsPaging
 * }
 */
final class CollectionResponseAPIUsage implements BaseModel
{
    /** @use SdkModel<collection_response_api_usage> */
    use SdkModel;

    /** @var list<APIUsage> $results */
    #[Api(list: APIUsage::class)]
    public array $results;

    #[Api(optional: true)]
    public ?MarketingEmailsPaging $paging;

    /**
     * `new CollectionResponseAPIUsage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseAPIUsage::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseAPIUsage)->withResults(...)
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
     * @param list<APIUsage> $results
     */
    public static function with(
        array $results,
        ?MarketingEmailsPaging $paging = null
    ): self {
        $obj = new self;

        $obj->results = $results;

        null !== $paging && $obj->paging = $paging;

        return $obj;
    }

    /**
     * @param list<APIUsage> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    public function withPaging(MarketingEmailsPaging $paging): self
    {
        $obj = clone $this;
        $obj->paging = $paging;

        return $obj;
    }
}
