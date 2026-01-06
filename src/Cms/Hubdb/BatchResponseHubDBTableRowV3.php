<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Cms\Hubdb\BatchResponseHubDBTableRowV3\Status;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BatchResponseHubDBTableRowV3Shape = array{
 *   completedAt: \DateTimeInterface,
 *   results: list<HubDBTableRowV3>,
 *   startedAt: \DateTimeInterface,
 *   status: value-of<Status>,
 *   links?: array<string,string>|null,
 *   requestedAt?: \DateTimeInterface|null,
 * }
 */
final class BatchResponseHubDBTableRowV3 implements BaseModel
{
    /** @use SdkModel<BatchResponseHubDBTableRowV3Shape> */
    use SdkModel;

    /**
     * The timestamp indicating when the batch processing was completed.
     */
    #[Required]
    public \DateTimeInterface $completedAt;

    /** @var list<HubDBTableRowV3> $results */
    #[Required(list: HubDBTableRowV3::class)]
    public array $results;

    /**
     * The timestamp indicating when the batch processing began.
     */
    #[Required]
    public \DateTimeInterface $startedAt;

    /**
     * The current status of the batch operation, with possible values: CANCELED, COMPLETE, PENDING, PROCESSING.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * A collection of related links associated with the batch response.
     *
     * @var array<string,string>|null $links
     */
    #[Optional(map: 'string')]
    public ?array $links;

    /**
     * The timestamp indicating when the batch request was made.
     */
    #[Optional]
    public ?\DateTimeInterface $requestedAt;

    /**
     * `new BatchResponseHubDBTableRowV3()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchResponseHubDBTableRowV3::with(
     *   completedAt: ..., results: ..., startedAt: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchResponseHubDBTableRowV3)
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
     * @param list<HubDBTableRowV3|array{
     *   id: string,
     *   childTableID: string,
     *   createdAt: \DateTimeInterface,
     *   name: string,
     *   path: string,
     *   publishedAt: \DateTimeInterface,
     *   updatedAt: \DateTimeInterface,
     *   values: array<string,mixed>,
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
        $obj = new self;

        $obj['completedAt'] = $completedAt;
        $obj['results'] = $results;
        $obj['startedAt'] = $startedAt;
        $obj['status'] = $status;

        null !== $links && $obj['links'] = $links;
        null !== $requestedAt && $obj['requestedAt'] = $requestedAt;

        return $obj;
    }

    /**
     * The timestamp indicating when the batch processing was completed.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $obj = clone $this;
        $obj['completedAt'] = $completedAt;

        return $obj;
    }

    /**
     * @param list<HubDBTableRowV3|array{
     *   id: string,
     *   childTableID: string,
     *   createdAt: \DateTimeInterface,
     *   name: string,
     *   path: string,
     *   publishedAt: \DateTimeInterface,
     *   updatedAt: \DateTimeInterface,
     *   values: array<string,mixed>,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }

    /**
     * The timestamp indicating when the batch processing began.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $obj = clone $this;
        $obj['startedAt'] = $startedAt;

        return $obj;
    }

    /**
     * The current status of the batch operation, with possible values: CANCELED, COMPLETE, PENDING, PROCESSING.
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
     * @param array<string,string> $links
     */
    public function withLinks(array $links): self
    {
        $obj = clone $this;
        $obj['links'] = $links;

        return $obj;
    }

    /**
     * The timestamp indicating when the batch request was made.
     */
    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $obj = clone $this;
        $obj['requestedAt'] = $requestedAt;

        return $obj;
    }
}
