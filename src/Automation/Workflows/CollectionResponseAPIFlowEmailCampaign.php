<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;
use HubspotSDK\Marketing\Emails\Paging;

/**
 * @phpstan-type CollectionResponseAPIFlowEmailCampaignShape = array{
 *   results: list<APIFlowEmailCampaign>, paging?: Paging
 * }
 */
final class CollectionResponseAPIFlowEmailCampaign implements BaseModel, ResponseConverter
{
    /** @use SdkModel<CollectionResponseAPIFlowEmailCampaignShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<APIFlowEmailCampaign> $results */
    #[Api(list: APIFlowEmailCampaign::class)]
    public array $results;

    /**
     * Contains information pagination of results.
     */
    #[Api(optional: true)]
    public ?Paging $paging;

    /**
     * `new CollectionResponseAPIFlowEmailCampaign()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseAPIFlowEmailCampaign::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseAPIFlowEmailCampaign)->withResults(...)
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
     * @param list<APIFlowEmailCampaign> $results
     */
    public static function with(array $results, ?Paging $paging = null): self
    {
        $obj = new self;

        $obj->results = $results;

        null !== $paging && $obj->paging = $paging;

        return $obj;
    }

    /**
     * @param list<APIFlowEmailCampaign> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    /**
     * Contains information pagination of results.
     */
    public function withPaging(Paging $paging): self
    {
        $obj = clone $this;
        $obj->paging = $paging;

        return $obj;
    }
}
