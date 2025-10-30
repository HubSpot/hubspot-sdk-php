<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve emails sent by a workflow by ID.
 *
 * @see HubspotSDK\Automation\Workflows->listEmailCampaigns
 *
 * @phpstan-type WorkflowListEmailCampaignsParamsShape = array{
 *   after?: string, before?: string, flowID?: list<string>, limit?: int
 * }
 */
final class WorkflowListEmailCampaignsParams implements BaseModel
{
    /** @use SdkModel<WorkflowListEmailCampaignsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Api(optional: true)]
    public ?string $after;

    #[Api(optional: true)]
    public ?string $before;

    /**
     * The ID of the workflow.
     *
     * @var list<string>|null $flowID
     */
    #[Api(list: 'string', optional: true)]
    public ?array $flowID;

    /**
     * The maximum number of results to display per page.
     */
    #[Api(optional: true)]
    public ?int $limit;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $flowID
     */
    public static function with(
        ?string $after = null,
        ?string $before = null,
        ?array $flowID = null,
        ?int $limit = null,
    ): self {
        $obj = new self;

        null !== $after && $obj->after = $after;
        null !== $before && $obj->before = $before;
        null !== $flowID && $obj->flowID = $flowID;
        null !== $limit && $obj->limit = $limit;

        return $obj;
    }

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    public function withBefore(string $before): self
    {
        $obj = clone $this;
        $obj->before = $before;

        return $obj;
    }

    /**
     * The ID of the workflow.
     *
     * @param list<string> $flowID
     */
    public function withFlowID(array $flowID): self
    {
        $obj = clone $this;
        $obj->flowID = $flowID;

        return $obj;
    }

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }
}
