<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Cms\Hubdb\BatchResponseHubDBTableRowV3\Status;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type batch_response_hub_db_table_row_v3 = array{
 *   completedAt?: \DateTimeInterface,
 *   links?: array<string, string>,
 *   requestedAt?: \DateTimeInterface,
 *   results?: list<HubDBTableRowV3>,
 *   startedAt?: \DateTimeInterface,
 *   status?: value-of<Status>,
 * }
 */
final class BatchResponseHubDBTableRowV3 implements BaseModel, ResponseConverter
{
    /** @use SdkModel<batch_response_hub_db_table_row_v3> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?\DateTimeInterface $completedAt;

    /** @var array<string, string>|null $links */
    #[Api(map: 'string', optional: true)]
    public ?array $links;

    #[Api(optional: true)]
    public ?\DateTimeInterface $requestedAt;

    /** @var list<HubDBTableRowV3>|null $results */
    #[Api(list: HubDBTableRowV3::class, optional: true)]
    public ?array $results;

    #[Api(optional: true)]
    public ?\DateTimeInterface $startedAt;

    /** @var value-of<Status>|null $status */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string, string> $links
     * @param list<HubDBTableRowV3> $results
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?\DateTimeInterface $completedAt = null,
        ?array $links = null,
        ?\DateTimeInterface $requestedAt = null,
        ?array $results = null,
        ?\DateTimeInterface $startedAt = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $completedAt && $obj->completedAt = $completedAt;
        null !== $links && $obj->links = $links;
        null !== $requestedAt && $obj->requestedAt = $requestedAt;
        null !== $results && $obj->results = $results;
        null !== $startedAt && $obj->startedAt = $startedAt;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $obj = clone $this;
        $obj->completedAt = $completedAt;

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

    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $obj = clone $this;
        $obj->requestedAt = $requestedAt;

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
}
