<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\ActionResponse\Status;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ActionResponseShape = array{
 *   completedAt: \DateTimeInterface,
 *   startedAt: \DateTimeInterface,
 *   status: Status|value-of<Status>,
 *   links?: array<string,string>|null,
 *   requestedAt?: \DateTimeInterface|null,
 * }
 */
final class ActionResponse implements BaseModel
{
    /** @use SdkModel<ActionResponseShape> */
    use SdkModel;

    /**
     * The timestamp indicating when the action was completed.
     */
    #[Required]
    public \DateTimeInterface $completedAt;

    /**
     * The timestamp indicating when the action was started.
     */
    #[Required]
    public \DateTimeInterface $startedAt;

    /**
     * The current status of the action, with possible values: CANCELED, COMPLETE, PENDING, PROCESSING.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * A map of link names to associated URIs containing documentation about the error or recommended remediation steps.
     *
     * @var array<string,string>|null $links
     */
    #[Optional(map: 'string')]
    public ?array $links;

    /**
     * The timestamp indicating when the action was requested.
     */
    #[Optional]
    public ?\DateTimeInterface $requestedAt;

    /**
     * `new ActionResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionResponse::with(completedAt: ..., startedAt: ..., status: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionResponse)->withCompletedAt(...)->withStartedAt(...)->withStatus(...)
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
     * @param Status|value-of<Status> $status
     * @param array<string,string>|null $links
     */
    public static function with(
        \DateTimeInterface $completedAt,
        \DateTimeInterface $startedAt,
        Status|string $status,
        ?array $links = null,
        ?\DateTimeInterface $requestedAt = null,
    ): self {
        $self = new self;

        $self['completedAt'] = $completedAt;
        $self['startedAt'] = $startedAt;
        $self['status'] = $status;

        null !== $links && $self['links'] = $links;
        null !== $requestedAt && $self['requestedAt'] = $requestedAt;

        return $self;
    }

    /**
     * The timestamp indicating when the action was completed.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $self = clone $this;
        $self['completedAt'] = $completedAt;

        return $self;
    }

    /**
     * The timestamp indicating when the action was started.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }

    /**
     * The current status of the action, with possible values: CANCELED, COMPLETE, PENDING, PROCESSING.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * A map of link names to associated URIs containing documentation about the error or recommended remediation steps.
     *
     * @param array<string,string> $links
     */
    public function withLinks(array $links): self
    {
        $self = clone $this;
        $self['links'] = $links;

        return $self;
    }

    /**
     * The timestamp indicating when the action was requested.
     */
    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $self = clone $this;
        $self['requestedAt'] = $requestedAt;

        return $self;
    }
}
