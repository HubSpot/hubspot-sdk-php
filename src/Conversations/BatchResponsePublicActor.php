<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\AgentActor\Type;
use HubspotSDK\Conversations\BatchResponsePublicActor\Status;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BatchResponsePublicActorShape = array{
 *   completedAt: \DateTimeInterface,
 *   results: list<AgentActor|BotActor|IntegratorActor|SystemActor|VisitorActor|EmailActor|LlmActor>,
 *   startedAt: \DateTimeInterface,
 *   status: value-of<Status>,
 *   links?: array<string,string>|null,
 *   requestedAt?: \DateTimeInterface|null,
 * }
 */
final class BatchResponsePublicActor implements BaseModel
{
    /** @use SdkModel<BatchResponsePublicActorShape> */
    use SdkModel;

    #[Required]
    public \DateTimeInterface $completedAt;

    /**
     * @var list<AgentActor|BotActor|IntegratorActor|SystemActor|VisitorActor|EmailActor|LlmActor> $results
     */
    #[Required(list: PublicActor::class)]
    public array $results;

    #[Required]
    public \DateTimeInterface $startedAt;

    /** @var value-of<Status> $status */
    #[Required(enum: Status::class)]
    public string $status;

    /** @var array<string,string>|null $links */
    #[Optional(map: 'string')]
    public ?array $links;

    #[Optional]
    public ?\DateTimeInterface $requestedAt;

    /**
     * `new BatchResponsePublicActor()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchResponsePublicActor::with(
     *   completedAt: ..., results: ..., startedAt: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchResponsePublicActor)
     *   ->withCompletedAt(...)
     *   ->withResults(...)
     *   ->withStartedAt(...)
     *   ->withStatus(...)
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
     * @param list<AgentActor|array{
     *   id: string,
     *   type: value-of<Type>,
     *   avatar?: string|null,
     *   email?: string|null,
     *   name?: string|null,
     * }|BotActor|array{
     *   id: string,
     *   type: value-of<BotActor\Type>,
     *   avatar?: string|null,
     *   name?: string|null,
     * }|IntegratorActor|array{
     *   id: string,
     *   name: string,
     *   type: value-of<IntegratorActor\Type>,
     *   avatar?: string|null,
     * }|SystemActor|array{
     *   id: string, type: value-of<SystemActor\Type>
     * }|VisitorActor|array{
     *   id: string,
     *   type: value-of<VisitorActor\Type>,
     *   avatar?: string|null,
     *   email?: string|null,
     *   name?: string|null,
     * }|EmailActor|array{
     *   id: string,
     *   email: string,
     *   type: value-of<EmailActor\Type>,
     * }|LlmActor|array{
     *   id: string,
     *   type: value-of<LlmActor\Type>,
     *   avatar?: string|null,
     *   name?: string|null,
     * }> $results
     * @param Status|value-of<Status> $status
     * @param array<string,string> $links
     */
    public static function with(
        \DateTimeInterface $completedAt,
        array $results,
        \DateTimeInterface $startedAt,
        Status|string $status,
        ?array $links = null,
        ?\DateTimeInterface $requestedAt = null,
    ): self {
        $self = new self;

        $self['completedAt'] = $completedAt;
        $self['results'] = $results;
        $self['startedAt'] = $startedAt;
        $self['status'] = $status;

        null !== $links && $self['links'] = $links;
        null !== $requestedAt && $self['requestedAt'] = $requestedAt;

        return $self;
    }

    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $self = clone $this;
        $self['completedAt'] = $completedAt;

        return $self;
    }

    /**
     * @param list<AgentActor|array{
     *   id: string,
     *   type: value-of<Type>,
     *   avatar?: string|null,
     *   email?: string|null,
     *   name?: string|null,
     * }|BotActor|array{
     *   id: string,
     *   type: value-of<BotActor\Type>,
     *   avatar?: string|null,
     *   name?: string|null,
     * }|IntegratorActor|array{
     *   id: string,
     *   name: string,
     *   type: value-of<IntegratorActor\Type>,
     *   avatar?: string|null,
     * }|SystemActor|array{
     *   id: string, type: value-of<SystemActor\Type>
     * }|VisitorActor|array{
     *   id: string,
     *   type: value-of<VisitorActor\Type>,
     *   avatar?: string|null,
     *   email?: string|null,
     *   name?: string|null,
     * }|EmailActor|array{
     *   id: string,
     *   email: string,
     *   type: value-of<EmailActor\Type>,
     * }|LlmActor|array{
     *   id: string,
     *   type: value-of<LlmActor\Type>,
     *   avatar?: string|null,
     *   name?: string|null,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * @param array<string,string> $links
     */
    public function withLinks(array $links): self
    {
        $self = clone $this;
        $self['links'] = $links;

        return $self;
    }

    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $self = clone $this;
        $self['requestedAt'] = $requestedAt;

        return $self;
    }
}
