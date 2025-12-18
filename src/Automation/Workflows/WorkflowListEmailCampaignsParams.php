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
 *   after?: string|null,
 *   before?: string|null,
 *   flowID?: list<string>|null,
 *   limit?: int|null,
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

    /** @var list<string>|null $flowID */
    #[Optional(list: 'string')]
    public ?array $flowID;

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
     * @param list<string>|null $flowID
     */
    public static function with(
        ?string $after = null,
        ?string $before = null,
        ?array $flowID = null,
        ?int $limit = null,
    ): self {
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $before && $self['before'] = $before;
        null !== $flowID && $self['flowID'] = $flowID;
        null !== $limit && $self['limit'] = $limit;

        return $self;
    }

    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    public function withBefore(string $before): self
    {
        $self = clone $this;
        $self['before'] = $before;

        return $self;
    }

    /**
     * @param list<string> $flowID
     */
    public function withFlowID(array $flowID): self
    {
        $self = clone $this;
        $self['flowID'] = $flowID;

        return $self;
    }

    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }
}
