<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\V4\BatchResponsePublicWideStatusBulkResponse\Status;

/**
 * @phpstan-import-type PublicWideStatusBulkResponseShape from \HubspotSDK\Marketing\Subscriptions\V4\PublicWideStatusBulkResponse
 *
 * @phpstan-type BatchResponsePublicWideStatusBulkResponseShape = array{
 *   completedAt: \DateTimeInterface,
 *   results: list<PublicWideStatusBulkResponseShape>,
 *   startedAt: \DateTimeInterface,
 *   status: Status|value-of<Status>,
 *   links?: array<string,string>|null,
 *   requestedAt?: \DateTimeInterface|null,
 * }
 */
final class BatchResponsePublicWideStatusBulkResponse implements BaseModel
{
    /** @use SdkModel<BatchResponsePublicWideStatusBulkResponseShape> */
    use SdkModel;

    /**
     * The date and time when the batch process was completed.
     */
    #[Required]
    public \DateTimeInterface $completedAt;

    /**
     * The array of results from the batch process, each containing subscription status information.
     *
     * @var list<PublicWideStatusBulkResponse> $results
     */
    #[Required(list: PublicWideStatusBulkResponse::class)]
    public array $results;

    /**
     * The date and time when the batch process began.
     */
    #[Required]
    public \DateTimeInterface $startedAt;

    /**
     * The current status of the batch process, with possible values: PENDING, PROCESSING, CANCELED, COMPLETE.
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
     * The date and time when the batch request was made.
     */
    #[Optional]
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
     * @param list<PublicWideStatusBulkResponseShape> $results
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
     * The date and time when the batch process was completed.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $self = clone $this;
        $self['completedAt'] = $completedAt;

        return $self;
    }

    /**
     * The array of results from the batch process, each containing subscription status information.
     *
     * @param list<PublicWideStatusBulkResponseShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * The date and time when the batch process began.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }

    /**
     * The current status of the batch process, with possible values: PENDING, PROCESSING, CANCELED, COMPLETE.
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
     * A collection of related links associated with the batch response.
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
     * The date and time when the batch request was made.
     */
    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $self = clone $this;
        $self['requestedAt'] = $requestedAt;

        return $self;
    }
}
