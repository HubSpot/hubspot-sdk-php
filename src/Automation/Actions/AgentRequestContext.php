<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\AgentRequestContext\Source;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ChirpAIContextObjectShape from \HubspotSDK\Automation\Actions\ChirpAIContextObject
 *
 * @phpstan-type AgentRequestContextShape = array{
 *   agentID: int,
 *   chirpAIContextObject: ChirpAIContextObject|ChirpAIContextObjectShape,
 *   source: Source|value-of<Source>,
 *   trajectoryID?: string|null,
 * }
 */
final class AgentRequestContext implements BaseModel
{
    /** @use SdkModel<AgentRequestContextShape> */
    use SdkModel;

    #[Required('agentId')]
    public int $agentID;

    #[Required('chirpAiContextObject')]
    public ChirpAIContextObject $chirpAIContextObject;

    /** @var value-of<Source> $source */
    #[Required(enum: Source::class)]
    public string $source;

    #[Optional('trajectoryId')]
    public ?string $trajectoryID;

    /**
     * `new AgentRequestContext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentRequestContext::with(agentID: ..., chirpAIContextObject: ..., source: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentRequestContext)
     *   ->withAgentID(...)
     *   ->withChirpAIContextObject(...)
     *   ->withSource(...)
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
     * @param ChirpAIContextObject|ChirpAIContextObjectShape $chirpAIContextObject
     * @param Source|value-of<Source> $source
     */
    public static function with(
        int $agentID,
        ChirpAIContextObject|array $chirpAIContextObject,
        Source|string $source = 'AGENTS',
        ?string $trajectoryID = null,
    ): self {
        $self = new self;

        $self['agentID'] = $agentID;
        $self['chirpAIContextObject'] = $chirpAIContextObject;
        $self['source'] = $source;

        null !== $trajectoryID && $self['trajectoryID'] = $trajectoryID;

        return $self;
    }

    public function withAgentID(int $agentID): self
    {
        $self = clone $this;
        $self['agentID'] = $agentID;

        return $self;
    }

    /**
     * @param ChirpAIContextObject|ChirpAIContextObjectShape $chirpAIContextObject
     */
    public function withChirpAIContextObject(
        ChirpAIContextObject|array $chirpAIContextObject
    ): self {
        $self = clone $this;
        $self['chirpAIContextObject'] = $chirpAIContextObject;

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

    public function withTrajectoryID(string $trajectoryID): self
    {
        $self = clone $this;
        $self['trajectoryID'] = $trajectoryID;

        return $self;
    }
}
