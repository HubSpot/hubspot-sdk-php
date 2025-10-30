<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\V4\ActionResponseWithResultsPublicStatus\Status;
use HubspotSDK\StandardError;

/**
 * @phpstan-type ActionResponseWithResultsPublicStatusShape = array{
 *   completedAt: \DateTimeInterface,
 *   results: list<PublicStatus>,
 *   startedAt: \DateTimeInterface,
 *   status: value-of<Status>,
 *   errors?: list<StandardError>,
 *   links?: array<string, string>,
 *   numErrors?: int,
 *   requestedAt?: \DateTimeInterface,
 * }
 */
final class ActionResponseWithResultsPublicStatus implements BaseModel
{
    /** @use SdkModel<ActionResponseWithResultsPublicStatusShape> */
    use SdkModel;

    /**
     * The date and time when the operation was completed.
     */
    #[Api]
    public \DateTimeInterface $completedAt;

    /**
     * An array of results from the operation.
     *
     * @var list<PublicStatus> $results
     */
    #[Api(list: PublicStatus::class)]
    public array $results;

    /**
     * The date and time when the operation started.
     */
    #[Api]
    public \DateTimeInterface $startedAt;

    /**
     * Indicates the current status of the operation, with possible values: PENDING, PROCESSING, CANCELED, COMPLETE.
     *
     * @var value-of<Status> $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    /**
     * A list of errors that occurred during the operation.
     *
     * @var list<StandardError>|null $errors
     */
    #[Api(list: StandardError::class, optional: true)]
    public ?array $errors;

    /**
     * Contains URLs related to the response, such as documentation or resources.
     *
     * @var array<string, string>|null $links
     */
    #[Api(map: 'string', optional: true)]
    public ?array $links;

    /**
     * The number of errors that occurred during the operation.
     */
    #[Api(optional: true)]
    public ?int $numErrors;

    /**
     * The date and time when the request was made.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $requestedAt;

    /**
     * `new ActionResponseWithResultsPublicStatus()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionResponseWithResultsPublicStatus::with(
     *   completedAt: ..., results: ..., startedAt: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionResponseWithResultsPublicStatus)
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
     * @param list<PublicStatus> $results
     * @param Status|value-of<Status> $status
     * @param list<StandardError> $errors
     * @param array<string, string> $links
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
     * The date and time when the operation was completed.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $obj = clone $this;
        $obj->completedAt = $completedAt;

        return $obj;
    }

    /**
     * An array of results from the operation.
     *
     * @param list<PublicStatus> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    /**
     * The date and time when the operation started.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $obj = clone $this;
        $obj->startedAt = $startedAt;

        return $obj;
    }

    /**
     * Indicates the current status of the operation, with possible values: PENDING, PROCESSING, CANCELED, COMPLETE.
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
     * A list of errors that occurred during the operation.
     *
     * @param list<StandardError> $errors
     */
    public function withErrors(array $errors): self
    {
        $obj = clone $this;
        $obj->errors = $errors;

        return $obj;
    }

    /**
     * Contains URLs related to the response, such as documentation or resources.
     *
     * @param array<string, string> $links
     */
    public function withLinks(array $links): self
    {
        $obj = clone $this;
        $obj->links = $links;

        return $obj;
    }

    /**
     * The number of errors that occurred during the operation.
     */
    public function withNumErrors(int $numErrors): self
    {
        $obj = clone $this;
        $obj->numErrors = $numErrors;

        return $obj;
    }

    /**
     * The date and time when the request was made.
     */
    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $obj = clone $this;
        $obj->requestedAt = $requestedAt;

        return $obj;
    }
}
