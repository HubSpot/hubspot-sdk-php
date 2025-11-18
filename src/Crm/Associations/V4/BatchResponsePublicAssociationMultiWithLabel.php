<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Associations\V4\BatchResponsePublicAssociationMultiWithLabel\Status;
use HubspotSDK\StandardError;

/**
 * @phpstan-type BatchResponsePublicAssociationMultiWithLabelShape = array{
 *   completedAt: \DateTimeInterface,
 *   results: list<PublicAssociationMultiWithLabel>,
 *   startedAt: \DateTimeInterface,
 *   status: value-of<Status>,
 *   errors?: list<StandardError>|null,
 *   links?: array<string,string>|null,
 *   numErrors?: int|null,
 *   requestedAt?: \DateTimeInterface|null,
 * }
 */
final class BatchResponsePublicAssociationMultiWithLabel implements BaseModel
{
    /** @use SdkModel<BatchResponsePublicAssociationMultiWithLabelShape> */
    use SdkModel;

    /**
     * The timestamp when the batch processing was completed, in ISO 8601 format.
     */
    #[Api]
    public \DateTimeInterface $completedAt;

    /** @var list<PublicAssociationMultiWithLabel> $results */
    #[Api(list: PublicAssociationMultiWithLabel::class)]
    public array $results;

    /**
     * The timestamp when the batch processing began, in ISO 8601 format.
     */
    #[Api]
    public \DateTimeInterface $startedAt;

    /**
     * The status of the batch processing request: "PENDING", "PROCESSING", "CANCELED", or "COMPLETE".
     *
     * @var value-of<Status> $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    /** @var list<StandardError>|null $errors */
    #[Api(list: StandardError::class, optional: true)]
    public ?array $errors;

    /**
     * An object containing relevant links related to the batch request.
     *
     * @var array<string,string>|null $links
     */
    #[Api(map: 'string', optional: true)]
    public ?array $links;

    /**
     * The number of errors encountered during the batch processing.
     */
    #[Api(optional: true)]
    public ?int $numErrors;

    /**
     * The timestamp when the batch request was initially made, in ISO 8601 format.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $requestedAt;

    /**
     * `new BatchResponsePublicAssociationMultiWithLabel()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchResponsePublicAssociationMultiWithLabel::with(
     *   completedAt: ..., results: ..., startedAt: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchResponsePublicAssociationMultiWithLabel)
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
     * @param list<PublicAssociationMultiWithLabel> $results
     * @param Status|value-of<Status> $status
     * @param list<StandardError> $errors
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
        $obj = new self;

        $obj->completedAt = $completedAt;
        $obj->results = $results;
        $obj->startedAt = $startedAt;
        $obj['status'] = $status;

        null !== $errors && $obj->errors = $errors;
        null !== $links && $obj->links = $links;
        null !== $numErrors && $obj->numErrors = $numErrors;
        null !== $requestedAt && $obj->requestedAt = $requestedAt;

        return $obj;
    }

    /**
     * The timestamp when the batch processing was completed, in ISO 8601 format.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $obj = clone $this;
        $obj->completedAt = $completedAt;

        return $obj;
    }

    /**
     * @param list<PublicAssociationMultiWithLabel> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    /**
     * The timestamp when the batch processing began, in ISO 8601 format.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $obj = clone $this;
        $obj->startedAt = $startedAt;

        return $obj;
    }

    /**
     * The status of the batch processing request: "PENDING", "PROCESSING", "CANCELED", or "COMPLETE".
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
     * @param list<StandardError> $errors
     */
    public function withErrors(array $errors): self
    {
        $obj = clone $this;
        $obj->errors = $errors;

        return $obj;
    }

    /**
     * An object containing relevant links related to the batch request.
     *
     * @param array<string,string> $links
     */
    public function withLinks(array $links): self
    {
        $obj = clone $this;
        $obj->links = $links;

        return $obj;
    }

    /**
     * The number of errors encountered during the batch processing.
     */
    public function withNumErrors(int $numErrors): self
    {
        $obj = clone $this;
        $obj->numErrors = $numErrors;

        return $obj;
    }

    /**
     * The timestamp when the batch request was initially made, in ISO 8601 format.
     */
    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $obj = clone $this;
        $obj->requestedAt = $requestedAt;

        return $obj;
    }
}
