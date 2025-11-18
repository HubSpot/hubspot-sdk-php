<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Cms\Hubdb\BatchResponseHubDBTableRowV3\Status;
use HubspotSDK\Core\Attributes\Api;
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

    #[Api]
    public \DateTimeInterface $completedAt;

    /** @var list<HubDBTableRowV3> $results */
    #[Api(list: HubDBTableRowV3::class)]
    public array $results;

    #[Api]
    public \DateTimeInterface $startedAt;

    /** @var value-of<Status> $status */
    #[Api(enum: Status::class)]
    public string $status;

    /** @var array<string,string>|null $links */
    #[Api(map: 'string', optional: true)]
    public ?array $links;

    #[Api(optional: true)]
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
     * @param list<HubDBTableRowV3> $results
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

        $obj->completedAt = $completedAt;
        $obj->results = $results;
        $obj->startedAt = $startedAt;
        $obj['status'] = $status;

        null !== $links && $obj->links = $links;
        null !== $requestedAt && $obj->requestedAt = $requestedAt;

        return $obj;
    }

    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $obj = clone $this;
        $obj->completedAt = $completedAt;

        return $obj;
    }

    /**
     * @param list<HubDBTableRowV3> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $obj = clone $this;
        $obj->startedAt = $startedAt;

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
     * @param array<string,string> $links
     */
    public function withLinks(array $links): self
    {
        $obj = clone $this;
        $obj->links = $links;

        return $obj;
    }

    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $obj = clone $this;
        $obj->requestedAt = $requestedAt;

        return $obj;
    }
}
