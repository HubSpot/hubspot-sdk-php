<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\WorkflowsRequestContext\Source;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ActionExecutionIndexIdentifierShape from \HubspotSDK\Automation\Actions\ActionExecutionIndexIdentifier
 *
 * @phpstan-type WorkflowsRequestContextShape = array{
 *   source: Source|value-of<Source>,
 *   workflowID: int,
 *   actionExecutionIndexIdentifier?: null|ActionExecutionIndexIdentifier|ActionExecutionIndexIdentifierShape,
 *   actionID?: int|null,
 * }
 */
final class WorkflowsRequestContext implements BaseModel
{
    /** @use SdkModel<WorkflowsRequestContextShape> */
    use SdkModel;

    /** @var value-of<Source> $source */
    #[Required(enum: Source::class)]
    public string $source;

    #[Required('workflowId')]
    public int $workflowID;

    #[Optional]
    public ?ActionExecutionIndexIdentifier $actionExecutionIndexIdentifier;

    #[Optional('actionId')]
    public ?int $actionID;

    /**
     * `new WorkflowsRequestContext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WorkflowsRequestContext::with(source: ..., workflowID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WorkflowsRequestContext)->withSource(...)->withWorkflowID(...)
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
     * @param Source|value-of<Source> $source
     * @param ActionExecutionIndexIdentifier|ActionExecutionIndexIdentifierShape|null $actionExecutionIndexIdentifier
     */
    public static function with(
        int $workflowID,
        Source|string $source = 'WORKFLOWS',
        ActionExecutionIndexIdentifier|array|null $actionExecutionIndexIdentifier = null,
        ?int $actionID = null,
    ): self {
        $self = new self;

        $self['source'] = $source;
        $self['workflowID'] = $workflowID;

        null !== $actionExecutionIndexIdentifier && $self['actionExecutionIndexIdentifier'] = $actionExecutionIndexIdentifier;
        null !== $actionID && $self['actionID'] = $actionID;

        return $self;
    }

    /**
     * @param Source|value-of<Source> $source
     */
    public function withSource(Source|string $source): self
    {
        $self = clone $this;
        $self['source'] = $source;

        return $self;
    }

    public function withWorkflowID(int $workflowID): self
    {
        $self = clone $this;
        $self['workflowID'] = $workflowID;

        return $self;
    }

    /**
     * @param ActionExecutionIndexIdentifier|ActionExecutionIndexIdentifierShape $actionExecutionIndexIdentifier
     */
    public function withActionExecutionIndexIdentifier(
        ActionExecutionIndexIdentifier|array $actionExecutionIndexIdentifier
    ): self {
        $self = clone $this;
        $self['actionExecutionIndexIdentifier'] = $actionExecutionIndexIdentifier;

        return $self;
    }

    public function withActionID(int $actionID): self
    {
        $self = clone $this;
        $self['actionID'] = $actionID;

        return $self;
    }
}
