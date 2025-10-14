<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\V4\BatchResponsePublicWideStatusBulkResponse\Status;

/**
 * @phpstan-type batch_response_public_wide_status_bulk_response = array{
 *   completedAt: \DateTimeInterface,
 *   results: list<PublicWideStatusBulkResponse>,
 *   startedAt: \DateTimeInterface,
 *   status: value-of<Status>,
 *   links?: array<string, string>,
 *   requestedAt?: \DateTimeInterface,
 * }
 */
final class BatchResponsePublicWideStatusBulkResponse implements BaseModel
{
    /** @use SdkModel<batch_response_public_wide_status_bulk_response> */
    use SdkModel;

    /**
     * The date and time when the batch process was completed.
     */
    #[Api]
    public \DateTimeInterface $completedAt;

    /**
     * The array of results from the batch process, each containing subscription status information.
     *
     * @var list<PublicWideStatusBulkResponse> $results
     */
    #[Api(list: PublicWideStatusBulkResponse::class)]
    public array $results;

    /**
     * The date and time when the batch process began.
     */
    #[Api]
    public \DateTimeInterface $startedAt;

    /**
     * The current status of the batch process, with possible values: PENDING, PROCESSING, CANCELED, COMPLETE.
     *
     * @var value-of<Status> $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    /**
     * A collection of related links associated with the batch response.
     *
     * @var array<string, string>|null $links
     */
    #[Api(map: 'string', optional: true)]
    public ?array $links;

    /**
     * The date and time when the batch request was made.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $requestedAt;

    /**
     * `new BatchResponsePublicWideStatusBulkResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchResponsePublicWideStatusBulkResponse::with(
     *   completedAt: ..., results: ..., startedAt: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchResponsePublicWideStatusBulkResponse)
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
     * @param list<PublicWideStatusBulkResponse> $results
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
     * The date and time when the batch process was completed.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $obj = clone $this;
        $obj->completedAt = $completedAt;

        return $obj;
    }

    /**
     * The array of results from the batch process, each containing subscription status information.
     *
     * @param list<PublicWideStatusBulkResponse> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    /**
     * The date and time when the batch process began.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $obj = clone $this;
        $obj->startedAt = $startedAt;

        return $obj;
    }

    /**
     * The current status of the batch process, with possible values: PENDING, PROCESSING, CANCELED, COMPLETE.
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
     * A collection of related links associated with the batch response.
     *
     * @param array<string, string> $links
     */
    public function withLinks(array $links): self
    {
        $obj = clone $this;
        $obj->links = $links;

        return $obj;
    }

    /**
     * The date and time when the batch request was made.
     */
    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $obj = clone $this;
        $obj->requestedAt = $requestedAt;

        return $obj;
    }
}
