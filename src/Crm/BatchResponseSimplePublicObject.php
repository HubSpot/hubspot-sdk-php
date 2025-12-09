<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\BatchResponseSimplePublicObject\Status;
use HubspotSDK\ErrorDetail;
use HubspotSDK\StandardError;

/**
 * A public object batch response object.
 *
 * @phpstan-type BatchResponseSimplePublicObjectShape = array{
 *   completedAt: \DateTimeInterface,
 *   results: list<SimplePublicObject>,
 *   startedAt: \DateTimeInterface,
 *   status: value-of<Status>,
 *   errors?: list<StandardError>|null,
 *   links?: array<string,string>|null,
 *   numErrors?: int|null,
 *   requestedAt?: \DateTimeInterface|null,
 * }
 */
final class BatchResponseSimplePublicObject implements BaseModel
{
    /** @use SdkModel<BatchResponseSimplePublicObjectShape> */
    use SdkModel;

    /**
     * The timestamp when the batch processing was completed, in ISO 8601 format.
     */
    #[Required]
    public \DateTimeInterface $completedAt;

    /** @var list<SimplePublicObject> $results */
    #[Required(list: SimplePublicObject::class)]
    public array $results;

    /**
     * The timestamp when the batch processing began, in ISO 8601 format.
     */
    #[Required]
    public \DateTimeInterface $startedAt;

    /**
     * The status of the batch processing request: "PENDING", "PROCESSING", "CANCELLED", or "COMPLETE".
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /** @var list<StandardError>|null $errors */
    #[Optional(list: StandardError::class)]
    public ?array $errors;

    /**
     * An object containing relevant links related to the batch request.
     *
     * @var array<string,string>|null $links
     */
    #[Optional(map: 'string')]
    public ?array $links;

    /**
     * The number of errors encountered during the batch processing.
     */
    #[Optional]
    public ?int $numErrors;

    /**
     * The timestamp when the batch request was initially made, in ISO 8601 format.
     */
    #[Optional]
    public ?\DateTimeInterface $requestedAt;

    /**
     * `new BatchResponseSimplePublicObject()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchResponseSimplePublicObject::with(
     *   completedAt: ..., results: ..., startedAt: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchResponseSimplePublicObject)
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
     * @param list<SimplePublicObject|array{
     *   id: string,
     *   archived: bool,
     *   createdAt: \DateTimeInterface,
     *   properties: array<string,string|null>,
     *   updatedAt: \DateTimeInterface,
     *   archivedAt?: \DateTimeInterface|null,
     *   objectWriteTraceID?: string|null,
     *   propertiesWithHistory?: array<string,list<ValueWithTimestamp>>|null,
     *   url?: string|null,
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

    /**
     * The timestamp when the batch processing was completed, in ISO 8601 format.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $self = clone $this;
        $self['completedAt'] = $completedAt;

        return $self;
    }

    /**
     * @param list<SimplePublicObject|array{
     *   id: string,
     *   archived: bool,
     *   createdAt: \DateTimeInterface,
     *   properties: array<string,string|null>,
     *   updatedAt: \DateTimeInterface,
     *   archivedAt?: \DateTimeInterface|null,
     *   objectWriteTraceID?: string|null,
     *   propertiesWithHistory?: array<string,list<ValueWithTimestamp>>|null,
     *   url?: string|null,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * The timestamp when the batch processing began, in ISO 8601 format.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }

    /**
     * The status of the batch processing request: "PENDING", "PROCESSING", "CANCELLED", or "COMPLETE".
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
     * The number of errors encountered during the batch processing.
     */
    public function withNumErrors(int $numErrors): self
    {
        $self = clone $this;
        $self['numErrors'] = $numErrors;

        return $self;
    }

    /**
     * The timestamp when the batch request was initially made, in ISO 8601 format.
     */
    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $self = clone $this;
        $self['requestedAt'] = $requestedAt;

        return $self;
    }
}
