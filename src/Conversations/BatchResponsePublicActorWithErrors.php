<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\AgentActor\Type;
use HubspotSDK\Conversations\BatchResponsePublicActorWithErrors\Status;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ErrorDetail;
use HubspotSDK\StandardError;

/**
 * @phpstan-type BatchResponsePublicActorWithErrorsShape = array{
 *   completedAt: \DateTimeInterface,
 *   results: list<AgentActor|BotActor|IntegratorActor|SystemActor|VisitorActor|EmailActor|LlmActor>,
 *   startedAt: \DateTimeInterface,
 *   status: value-of<Status>,
 *   errors?: list<StandardError>|null,
 *   links?: array<string,string>|null,
 *   numErrors?: int|null,
 *   requestedAt?: \DateTimeInterface|null,
 * }
 */
final class BatchResponsePublicActorWithErrors implements BaseModel
{
    /** @use SdkModel<BatchResponsePublicActorWithErrorsShape> */
    use SdkModel;

    #[Api]
    public \DateTimeInterface $completedAt;

    /**
     * @var list<AgentActor|BotActor|IntegratorActor|SystemActor|VisitorActor|EmailActor|LlmActor> $results
     */
    #[Api(list: PublicActor::class)]
    public array $results;

    #[Api]
    public \DateTimeInterface $startedAt;

    /** @var value-of<Status> $status */
    #[Api(enum: Status::class)]
    public string $status;

    /** @var list<StandardError>|null $errors */
    #[Api(list: StandardError::class, optional: true)]
    public ?array $errors;

    /** @var array<string,string>|null $links */
    #[Api(map: 'string', optional: true)]
    public ?array $links;

    #[Api(optional: true)]
    public ?int $numErrors;

    #[Api(optional: true)]
    public ?\DateTimeInterface $requestedAt;

    /**
     * `new BatchResponsePublicActorWithErrors()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchResponsePublicActorWithErrors::with(
     *   completedAt: ..., results: ..., startedAt: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchResponsePublicActorWithErrors)
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
     * @param list<StandardError|array{
     *   category: string,
     *   context: array<string,list<string>>,
     *   errors: list<ErrorDetail>,
     *   links: array<string,string>,
     *   message: string,
     *   status: string,
     *   id?: string|null,
     *   subCategory?: mixed,
     * }> $errors
     * @param array<string,string> $links
     */
    public static function with(
        \DateTimeInterface $completedAt,
        array $results,
        \DateTimeInterface $startedAt,
        Status|string $status,
        ?array $errors = null,
        ?array $links = null,
        ?int $numErrors = null,
        ?\DateTimeInterface $requestedAt = null,
    ): self {
        $obj = new self;

        $obj['completedAt'] = $completedAt;
        $obj['results'] = $results;
        $obj['startedAt'] = $startedAt;
        $obj['status'] = $status;

        null !== $errors && $obj['errors'] = $errors;
        null !== $links && $obj['links'] = $links;
        null !== $numErrors && $obj['numErrors'] = $numErrors;
        null !== $requestedAt && $obj['requestedAt'] = $requestedAt;

        return $obj;
    }

    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $obj = clone $this;
        $obj['completedAt'] = $completedAt;

        return $obj;
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
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }

    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $obj = clone $this;
        $obj['startedAt'] = $startedAt;

        return $obj;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * @param list<StandardError|array{
     *   category: string,
     *   context: array<string,list<string>>,
     *   errors: list<ErrorDetail>,
     *   links: array<string,string>,
     *   message: string,
     *   status: string,
     *   id?: string|null,
     *   subCategory?: mixed,
     * }> $errors
     */
    public function withErrors(array $errors): self
    {
        $obj = clone $this;
        $obj['errors'] = $errors;

        return $obj;
    }

    /**
     * @param array<string,string> $links
     */
    public function withLinks(array $links): self
    {
        $obj = clone $this;
        $obj['links'] = $links;

        return $obj;
    }

    public function withNumErrors(int $numErrors): self
    {
        $obj = clone $this;
        $obj['numErrors'] = $numErrors;

        return $obj;
    }

    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $obj = clone $this;
        $obj['requestedAt'] = $requestedAt;

        return $obj;
    }
}
