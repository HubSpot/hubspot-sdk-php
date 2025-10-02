<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Paging;

/**
 * @phpstan-type automation_collection_response_api_flow_email_campaign = array{
 *   results: list<AutomationAPIFlowEmailCampaign>, paging?: Paging
 * }
 */
final class AutomationCollectionResponseAPIFlowEmailCampaign implements BaseModel
{
    /** @use SdkModel<automation_collection_response_api_flow_email_campaign> */
    use SdkModel;

    /** @var list<AutomationAPIFlowEmailCampaign> $results */
    #[Api(list: AutomationAPIFlowEmailCampaign::class)]
    public array $results;

    #[Api(optional: true)]
    public ?Paging $paging;

    /**
     * `new AutomationCollectionResponseAPIFlowEmailCampaign()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationCollectionResponseAPIFlowEmailCampaign::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationCollectionResponseAPIFlowEmailCampaign)->withResults(...)
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
     * @param list<AutomationAPIFlowEmailCampaign> $results
     */
    public static function with(array $results, ?Paging $paging = null): self
    {
        $obj = new self;

        $obj->results = $results;

        null !== $paging && $obj->paging = $paging;

        return $obj;
    }

    /**
     * @param list<AutomationAPIFlowEmailCampaign> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    public function withPaging(Paging $paging): self
    {
        $obj = clone $this;
        $obj->paging = $paging;

        return $obj;
    }
}
