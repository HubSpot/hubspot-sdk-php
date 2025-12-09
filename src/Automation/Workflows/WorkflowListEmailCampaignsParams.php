<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Automation\WorkflowsService::listEmailCampaigns()
 *
 * @phpstan-type WorkflowListEmailCampaignsParamsShape = array{
 *   after?: string, before?: string, flowId?: list<string>, limit?: int
 * }
 */
final class WorkflowListEmailCampaignsParams implements BaseModel
{
    /** @use SdkModel<WorkflowListEmailCampaignsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $after;

    #[Optional]
    public ?string $before;

    /** @var list<string>|null $flowId */
    #[Optional(list: 'string')]
    public ?array $flowId;

    #[Optional]
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
     * @param list<string> $flowId
     */
    public static function with(
        ?string $after = null,
        ?string $before = null,
        ?array $flowId = null,
        ?int $limit = null,
    ): self {
        $obj = new self;

        null !== $after && $obj['after'] = $after;
        null !== $before && $obj['before'] = $before;
        null !== $flowId && $obj['flowId'] = $flowId;
        null !== $limit && $obj['limit'] = $limit;

        return $obj;
    }

    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj['after'] = $after;

        return $obj;
    }

    public function withBefore(string $before): self
    {
        $obj = clone $this;
        $obj['before'] = $before;

        return $obj;
    }

    /**
     * @param list<string> $flowID
     */
    public function withFlowID(array $flowID): self
    {
        $obj = clone $this;
        $obj['flowId'] = $flowID;

        return $obj;
    }

    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj['limit'] = $limit;

        return $obj;
    }
}
