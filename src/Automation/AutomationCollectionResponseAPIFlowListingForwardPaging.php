<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;

/**
 * @phpstan-type automation_collection_response_api_flow_listing_forward_paging = array{
 *   results: list<AutomationAPIFlowListing>, paging?: ForwardPaging
 * }
 */
final class AutomationCollectionResponseAPIFlowListingForwardPaging implements BaseModel
{
    /**
     * @use SdkModel<automation_collection_response_api_flow_listing_forward_paging>
     */
    use SdkModel;

    /** @var list<AutomationAPIFlowListing> $results */
    #[Api(list: AutomationAPIFlowListing::class)]
    public array $results;

    #[Api(optional: true)]
    public ?ForwardPaging $paging;

    /**
     * `new AutomationCollectionResponseAPIFlowListingForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationCollectionResponseAPIFlowListingForwardPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationCollectionResponseAPIFlowListingForwardPaging)->withResults(...)
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
     * @param list<AutomationAPIFlowListing> $results
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
     * @param list<AutomationAPIFlowListing> $results
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
