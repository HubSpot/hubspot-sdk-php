<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\BatchResponseRecordIDWithMemberships\Status;

/**
 * @phpstan-import-type RecordIDWithMembershipsShape from \HubSpotSDK\Crm\Lists\RecordIDWithMemberships
 *
 * @phpstan-type BatchResponseRecordIDWithMembershipsShape = array{
 *   completedAt: \DateTimeInterface,
 *   results: list<RecordIDWithMemberships|RecordIDWithMembershipsShape>,
 *   startedAt: \DateTimeInterface,
 *   status: Status|value-of<Status>,
 *   links?: array<string,string>|null,
 *   requestedAt?: \DateTimeInterface|null,
 * }
 */
final class BatchResponseRecordIDWithMemberships implements BaseModel
{
    /** @use SdkModel<BatchResponseRecordIDWithMembershipsShape> */
    use SdkModel;

    #[Required]
    public \DateTimeInterface $completedAt;

    /** @var list<RecordIDWithMemberships> $results */
    #[Required(list: RecordIDWithMemberships::class)]
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
     * `new BatchResponseRecordIDWithMemberships()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchResponseRecordIDWithMemberships::with(
     *   completedAt: ..., results: ..., startedAt: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchResponseRecordIDWithMemberships)
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
     * @param list<RecordIDWithMemberships|RecordIDWithMembershipsShape> $results
     * @param Status|value-of<Status> $status
     * @param array<string,string>|null $links
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
     * @param list<RecordIDWithMemberships|RecordIDWithMembershipsShape> $results
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
