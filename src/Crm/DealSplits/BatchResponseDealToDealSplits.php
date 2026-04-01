<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\DealSplits;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\DealSplits\BatchResponseDealToDealSplits\Status;

/**
 * @phpstan-import-type DealToDealSplitsShape from \HubspotSDK\Crm\DealSplits\DealToDealSplits
 *
 * @phpstan-type BatchResponseDealToDealSplitsShape = array{
 *   completedAt: \DateTimeInterface,
 *   results: list<DealToDealSplits|DealToDealSplitsShape>,
 *   startedAt: \DateTimeInterface,
 *   status: Status|value-of<Status>,
 *   links?: array<string,string>|null,
 *   requestedAt?: \DateTimeInterface|null,
 * }
 */
final class BatchResponseDealToDealSplits implements BaseModel
{
    /** @use SdkModel<BatchResponseDealToDealSplitsShape> */
    use SdkModel;

    /**
     * The timestamp indicating when the batch operation was completed, in date-time format.
     */
    #[Required]
    public \DateTimeInterface $completedAt;

    /**
     * An array of deal-to-deal split objects representing the results of the batch operation.
     *
     * @var list<DealToDealSplits> $results
     */
    #[Required(list: DealToDealSplits::class)]
    public array $results;

    /**
     * The timestamp indicating when the batch operation started, in date-time format.
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
     * A map of link names to associated URIs for additional resources or documentation.
     *
     * @var array<string,string>|null $links
     */
    #[Optional(map: 'string')]
    public ?array $links;

    /**
     * The timestamp indicating when the batch operation was requested, in date-time format.
     */
    #[Optional]
    public ?\DateTimeInterface $requestedAt;

    /**
     * `new BatchResponseDealToDealSplits()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchResponseDealToDealSplits::with(
     *   completedAt: ..., results: ..., startedAt: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchResponseDealToDealSplits)
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
     * @param list<DealToDealSplits|DealToDealSplitsShape> $results
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

    /**
     * The timestamp indicating when the batch operation was completed, in date-time format.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $self = clone $this;
        $self['completedAt'] = $completedAt;

        return $self;
    }

    /**
     * An array of deal-to-deal split objects representing the results of the batch operation.
     *
     * @param list<DealToDealSplits|DealToDealSplitsShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * The timestamp indicating when the batch operation started, in date-time format.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }

    /**
     * The current status of the batch operation, with possible values: CANCELED, COMPLETE, PENDING, PROCESSING.
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
     * A map of link names to associated URIs for additional resources or documentation.
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
     * The timestamp indicating when the batch operation was requested, in date-time format.
     */
    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $self = clone $this;
        $self['requestedAt'] = $requestedAt;

        return $self;
    }
}
