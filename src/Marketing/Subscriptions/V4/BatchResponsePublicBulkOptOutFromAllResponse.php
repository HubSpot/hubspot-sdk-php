<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\V4\BatchResponsePublicBulkOptOutFromAllResponse\Status;
use HubspotSDK\StandardError;

/**
 * @phpstan-type batch_response_public_bulk_opt_out_from_all_response = array{
 *   completedAt: \DateTimeInterface,
 *   results: list<PublicBulkOptOutFromAllResponse>,
 *   startedAt: \DateTimeInterface,
 *   status: value-of<Status>,
 *   errors?: list<StandardError>,
 *   links?: array<string, string>,
 *   numErrors?: int,
 *   requestedAt?: \DateTimeInterface,
 * }
 */
final class BatchResponsePublicBulkOptOutFromAllResponse implements BaseModel
{
    /** @use SdkModel<batch_response_public_bulk_opt_out_from_all_response> */
    use SdkModel;

    /**
     * The date and time when the bulk opt-out operation was completed.
     */
    #[Api]
    public \DateTimeInterface $completedAt;

    /**
     * An array containing the results of the bulk opt-out from all communications operation.
     *
     * @var list<PublicBulkOptOutFromAllResponse> $results
     */
    #[Api(list: PublicBulkOptOutFromAllResponse::class)]
    public array $results;

    /**
     * The date and time when the bulk opt-out operation began.
     */
    #[Api]
    public \DateTimeInterface $startedAt;

    /**
     * The current status of the bulk opt-out operation, which can be PENDING, PROCESSING, CANCELED, or COMPLETE.
     *
     * @var value-of<Status> $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    /**
     * An array of error objects detailing any issues encountered during the bulk opt-out operation.
     *
     * @var list<StandardError>|null $errors
     */
    #[Api(list: StandardError::class, optional: true)]
    public ?array $errors;

    /**
     * A collection of URLs linking to related resources or documentation.
     *
     * @var array<string, string>|null $links
     */
    #[Api(map: 'string', optional: true)]
    public ?array $links;

    /**
     * The total number of errors encountered during the bulk opt-out operation.
     */
    #[Api(optional: true)]
    public ?int $numErrors;

    /**
     * The date and time when the bulk opt-out request was made.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $requestedAt;

    /**
     * `new BatchResponsePublicBulkOptOutFromAllResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchResponsePublicBulkOptOutFromAllResponse::with(
     *   completedAt: ..., results: ..., startedAt: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchResponsePublicBulkOptOutFromAllResponse)
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
     * @param list<PublicBulkOptOutFromAllResponse> $results
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
     * The date and time when the bulk opt-out operation was completed.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $obj = clone $this;
        $obj->completedAt = $completedAt;

        return $obj;
    }

    /**
     * An array containing the results of the bulk opt-out from all communications operation.
     *
     * @param list<PublicBulkOptOutFromAllResponse> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    /**
     * The date and time when the bulk opt-out operation began.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $obj = clone $this;
        $obj->startedAt = $startedAt;

        return $obj;
    }

    /**
     * The current status of the bulk opt-out operation, which can be PENDING, PROCESSING, CANCELED, or COMPLETE.
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
     * An array of error objects detailing any issues encountered during the bulk opt-out operation.
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
     * A collection of URLs linking to related resources or documentation.
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
     * The total number of errors encountered during the bulk opt-out operation.
     */
    public function withNumErrors(int $numErrors): self
    {
        $obj = clone $this;
        $obj->numErrors = $numErrors;

        return $obj;
    }

    /**
     * The date and time when the bulk opt-out request was made.
     */
    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $obj = clone $this;
        $obj->requestedAt = $requestedAt;

        return $obj;
    }
}
