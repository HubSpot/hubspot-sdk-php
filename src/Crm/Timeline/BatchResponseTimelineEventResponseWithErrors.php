<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Timeline\BatchResponseTimelineEventResponseWithErrors\Status;
use HubspotSDK\ErrorDetail;
use HubspotSDK\StandardError;

/**
 * @phpstan-type BatchResponseTimelineEventResponseWithErrorsShape = array{
 *   completedAt: \DateTimeInterface,
 *   results: list<TimelineEventResponse>,
 *   startedAt: \DateTimeInterface,
 *   status: value-of<Status>,
 *   errors?: list<StandardError>|null,
 *   links?: array<string,string>|null,
 *   numErrors?: int|null,
 *   requestedAt?: \DateTimeInterface|null,
 * }
 */
final class BatchResponseTimelineEventResponseWithErrors implements BaseModel
{
    /** @use SdkModel<BatchResponseTimelineEventResponseWithErrorsShape> */
    use SdkModel;

    #[Required]
    public \DateTimeInterface $completedAt;

    /** @var list<TimelineEventResponse> $results */
    #[Required(list: TimelineEventResponse::class)]
    public array $results;

    #[Required]
    public \DateTimeInterface $startedAt;

    /** @var value-of<Status> $status */
    #[Required(enum: Status::class)]
    public string $status;

    /** @var list<StandardError>|null $errors */
    #[Optional(list: StandardError::class)]
    public ?array $errors;

    /** @var array<string,string>|null $links */
    #[Optional(map: 'string')]
    public ?array $links;

    #[Optional]
    public ?int $numErrors;

    #[Optional]
    public ?\DateTimeInterface $requestedAt;

    /**
     * `new BatchResponseTimelineEventResponseWithErrors()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchResponseTimelineEventResponseWithErrors::with(
     *   completedAt: ..., results: ..., startedAt: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchResponseTimelineEventResponseWithErrors)
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
     * @param list<TimelineEventResponse|array{
     *   id: string,
     *   eventTemplateID: string,
     *   objectType: string,
     *   tokens: array<string,string>,
     *   createdAt?: \DateTimeInterface|null,
     *   domain?: string|null,
     *   email?: string|null,
     *   extraData?: mixed,
     *   objectID?: string|null,
     *   timelineIFrame?: TimelineEventIFrame|null,
     *   timestamp?: \DateTimeInterface|null,
     *   utk?: string|null,
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
        $self = new self;

        $self['completedAt'] = $completedAt;
        $self['results'] = $results;
        $self['startedAt'] = $startedAt;
        $self['status'] = $status;

        null !== $errors && $self['errors'] = $errors;
        null !== $links && $self['links'] = $links;
        null !== $numErrors && $self['numErrors'] = $numErrors;
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
     * @param list<TimelineEventResponse|array{
     *   id: string,
     *   eventTemplateID: string,
     *   objectType: string,
     *   tokens: array<string,string>,
     *   createdAt?: \DateTimeInterface|null,
     *   domain?: string|null,
     *   email?: string|null,
     *   extraData?: mixed,
     *   objectID?: string|null,
     *   timelineIFrame?: TimelineEventIFrame|null,
     *   timestamp?: \DateTimeInterface|null,
     *   utk?: string|null,
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
        $self = clone $this;
        $self['errors'] = $errors;

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

    public function withNumErrors(int $numErrors): self
    {
        $self = clone $this;
        $self['numErrors'] = $numErrors;

        return $self;
    }

    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $self = clone $this;
        $self['requestedAt'] = $requestedAt;

        return $self;
    }
}
