<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Associations\BatchResponsePublicAssociationMulti\Status;
use HubspotSDK\StandardError;

/**
 * @phpstan-type BatchResponsePublicAssociationMultiShape = array{
 *   completedAt: \DateTimeInterface,
 *   results: list<PublicAssociationMulti>,
 *   startedAt: \DateTimeInterface,
 *   status: value-of<Status>,
 *   errors?: list<StandardError>|null,
 *   links?: array<string,string>|null,
 *   numErrors?: int|null,
 *   requestedAt?: \DateTimeInterface|null,
 * }
 */
final class BatchResponsePublicAssociationMulti implements BaseModel
{
    /** @use SdkModel<BatchResponsePublicAssociationMultiShape> */
    use SdkModel;

    /**
     * The date and time when the batch operation was completed.
     */
    #[Api]
    public \DateTimeInterface $completedAt;

    /** @var list<PublicAssociationMulti> $results */
    #[Api(list: PublicAssociationMulti::class)]
    public array $results;

    /**
     * The date and time when the batch operation started.
     */
    #[Api]
    public \DateTimeInterface $startedAt;

    /**
     * The current status of the batch operation, with possible values: PENDING, PROCESSING, CANCELED, COMPLETE.
     *
     * @var value-of<Status> $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    /** @var list<StandardError>|null $errors */
    #[Api(list: StandardError::class, optional: true)]
    public ?array $errors;

    /**
     * URLs linking to resources or documentation associated with the batch operation.
     *
     * @var array<string,string>|null $links
     */
    #[Api(map: 'string', optional: true)]
    public ?array $links;

    /**
     * The number of errors encountered during the batch operation.
     */
    #[Api(optional: true)]
    public ?int $numErrors;

    /**
     * The date and time when the batch request was made.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $requestedAt;

    /**
     * `new BatchResponsePublicAssociationMulti()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchResponsePublicAssociationMulti::with(
     *   completedAt: ..., results: ..., startedAt: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchResponsePublicAssociationMulti)
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
     * @param list<PublicAssociationMulti> $results
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
     * The date and time when the batch operation was completed.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $obj = clone $this;
        $obj->completedAt = $completedAt;

        return $obj;
    }

    /**
     * @param list<PublicAssociationMulti> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    /**
     * The date and time when the batch operation started.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $obj = clone $this;
        $obj->startedAt = $startedAt;

        return $obj;
    }

    /**
     * The current status of the batch operation, with possible values: PENDING, PROCESSING, CANCELED, COMPLETE.
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
     * URLs linking to resources or documentation associated with the batch operation.
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
     * The number of errors encountered during the batch operation.
     */
    public function withNumErrors(int $numErrors): self
    {
        $obj = clone $this;
        $obj->numErrors = $numErrors;

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
