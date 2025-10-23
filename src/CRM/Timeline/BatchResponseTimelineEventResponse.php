<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Timeline;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Timeline\BatchResponseTimelineEventResponse\Status;

/**
 * The state of the batch event request.
 *
 * @phpstan-type batch_response_timeline_event_response = array{
 *   completedAt: \DateTimeInterface,
 *   results: list<TimelineEventResponse>,
 *   startedAt: \DateTimeInterface,
 *   status: value-of<Status>,
 *   links?: array<string, string>,
 *   requestedAt?: \DateTimeInterface,
 * }
 */
final class BatchResponseTimelineEventResponse implements BaseModel
{
    /** @use SdkModel<batch_response_timeline_event_response> */
    use SdkModel;

    /**
     * The time the request was completed.
     */
    #[Api]
    public \DateTimeInterface $completedAt;

    /**
     * Successfully created events.
     *
     * @var list<TimelineEventResponse> $results
     */
    #[Api(list: TimelineEventResponse::class)]
    public array $results;

    /**
     * The time the request began processing.
     */
    #[Api]
    public \DateTimeInterface $startedAt;

    /**
     * The status of the batch response. Should always be COMPLETED if processed.
     *
     * @var value-of<Status> $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    /** @var array<string, string>|null $links */
    #[Api(map: 'string', optional: true)]
    public ?array $links;

    /**
     * The time the request occurred.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $requestedAt;

    /**
     * `new BatchResponseTimelineEventResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchResponseTimelineEventResponse::with(
     *   completedAt: ..., results: ..., startedAt: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchResponseTimelineEventResponse)
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
     * @param list<TimelineEventResponse> $results
     * @param Status|value-of<Status> $status
     * @param array<string, string> $links
     */
    public static function with(
        \DateTimeInterface $completedAt,
        array $results,
        \DateTimeInterface $startedAt,
        Status|string $status,
        ?array $links = null,
        ?\DateTimeInterface $requestedAt = null,
    ): self {
        $obj = new self;

        $obj->completedAt = $completedAt;
        $obj->results = $results;
        $obj->startedAt = $startedAt;
        $obj['status'] = $status;

        null !== $links && $obj->links = $links;
        null !== $requestedAt && $obj->requestedAt = $requestedAt;

        return $obj;
    }

    /**
     * The time the request was completed.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $obj = clone $this;
        $obj->completedAt = $completedAt;

        return $obj;
    }

    /**
     * Successfully created events.
     *
     * @param list<TimelineEventResponse> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    /**
     * The time the request began processing.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $obj = clone $this;
        $obj->startedAt = $startedAt;

        return $obj;
    }

    /**
     * The status of the batch response. Should always be COMPLETED if processed.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * @param array<string, string> $links
     */
    public function withLinks(array $links): self
    {
        $obj = clone $this;
        $obj->links = $links;

        return $obj;
    }

    /**
     * The time the request occurred.
     */
    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $obj = clone $this;
        $obj->requestedAt = $requestedAt;

        return $obj;
    }
}
