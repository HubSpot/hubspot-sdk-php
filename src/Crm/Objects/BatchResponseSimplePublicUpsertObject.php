<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Objects;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Objects\BatchResponseSimplePublicUpsertObject\Status;

/**
 * Represents the result of a batch upsert operation, including the operation’s status, timestamps, and a list of successfully created or updated objects.
 *
 * @phpstan-import-type SimplePublicUpsertObjectShape from \HubSpotSDK\Crm\Objects\SimplePublicUpsertObject
 *
 * @phpstan-type BatchResponseSimplePublicUpsertObjectShape = array{
 *   completedAt: \DateTimeInterface,
 *   results: list<SimplePublicUpsertObject|SimplePublicUpsertObjectShape>,
 *   startedAt: \DateTimeInterface,
 *   status: Status|value-of<Status>,
 *   links?: array<string,string>|null,
 *   requestedAt?: \DateTimeInterface|null,
 * }
 */
final class BatchResponseSimplePublicUpsertObject implements BaseModel
{
    /** @use SdkModel<BatchResponseSimplePublicUpsertObjectShape> */
    use SdkModel;

    /**
     * The timestamp when the batch process was completed, in ISO 8601 format.
     */
    #[Required]
    public \DateTimeInterface $completedAt;

    /** @var list<SimplePublicUpsertObject> $results */
    #[Required(list: SimplePublicUpsertObject::class)]
    public array $results;

    /**
     * The timestamp when the batch process began execution, in ISO 8601 format.
     */
    #[Required]
    public \DateTimeInterface $startedAt;

    /**
     * The status of the batch processing request. Can be: "PENDING", "PROCESSING", "CANCELED", or "COMPLETE".
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * An object containing relevant links related to the batch request.
     *
     * @var array<string,string>|null $links
     */
    #[Optional(map: 'string')]
    public ?array $links;

    /**
     * The timestamp when the batch process was initiated, in ISO 8601 format.
     */
    #[Optional]
    public ?\DateTimeInterface $requestedAt;

    /**
     * `new BatchResponseSimplePublicUpsertObject()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchResponseSimplePublicUpsertObject::with(
     *   completedAt: ..., results: ..., startedAt: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchResponseSimplePublicUpsertObject)
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
     * @param list<SimplePublicUpsertObject|SimplePublicUpsertObjectShape> $results
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
     * The timestamp when the batch process was completed, in ISO 8601 format.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $self = clone $this;
        $self['completedAt'] = $completedAt;

        return $self;
    }

    /**
     * @param list<SimplePublicUpsertObject|SimplePublicUpsertObjectShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * The timestamp when the batch process began execution, in ISO 8601 format.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }

    /**
     * The status of the batch processing request. Can be: "PENDING", "PROCESSING", "CANCELED", or "COMPLETE".
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
     * An object containing relevant links related to the batch request.
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
     * The timestamp when the batch process was initiated, in ISO 8601 format.
     */
    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $self = clone $this;
        $self['requestedAt'] = $requestedAt;

        return $self;
    }
}
