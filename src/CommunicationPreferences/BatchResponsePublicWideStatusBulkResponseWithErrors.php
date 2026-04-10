<?php

declare(strict_types=1);

namespace HubSpotSDK\CommunicationPreferences;

use HubSpotSDK\CommunicationPreferences\BatchResponsePublicWideStatusBulkResponseWithErrors\Status;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\StandardError;

/**
 * @phpstan-import-type PublicWideStatusBulkResponseShape from \HubSpotSDK\CommunicationPreferences\PublicWideStatusBulkResponse
 * @phpstan-import-type StandardErrorShape from \HubSpotSDK\StandardError
 *
 * @phpstan-type BatchResponsePublicWideStatusBulkResponseWithErrorsShape = array{
 *   completedAt: \DateTimeInterface,
 *   results: list<PublicWideStatusBulkResponse|PublicWideStatusBulkResponseShape>,
 *   startedAt: \DateTimeInterface,
 *   status: Status|value-of<Status>,
 *   errors?: list<StandardError|StandardErrorShape>|null,
 *   links?: array<string,string>|null,
 *   numErrors?: int|null,
 *   requestedAt?: \DateTimeInterface|null,
 * }
 */
final class BatchResponsePublicWideStatusBulkResponseWithErrors implements BaseModel
{
    /** @use SdkModel<BatchResponsePublicWideStatusBulkResponseWithErrorsShape> */
    use SdkModel;

    /**
     * The date and time when the operation was completed.
     */
    #[Required]
    public \DateTimeInterface $completedAt;

    /**
     * An array containing the results of the operation.
     *
     * @var list<PublicWideStatusBulkResponse> $results
     */
    #[Required(list: PublicWideStatusBulkResponse::class)]
    public array $results;

    /**
     * The date and time when the operation started.
     */
    #[Required]
    public \DateTimeInterface $startedAt;

    /**
     * The current status of the operation, which can be PENDING, PROCESSING, CANCELED, or COMPLETE.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * An array of error objects detailing any issues encountered during the operation.
     *
     * @var list<StandardError>|null $errors
     */
    #[Optional(list: StandardError::class)]
    public ?array $errors;

    /**
     * An object containing related links, where each key is a link name and each value is a URL.
     *
     * @var array<string,string>|null $links
     */
    #[Optional(map: 'string')]
    public ?array $links;

    /**
     * The number of errors encountered during the operation.
     */
    #[Optional]
    public ?int $numErrors;

    /**
     * The date and time when the operation was requested.
     */
    #[Optional]
    public ?\DateTimeInterface $requestedAt;

    /**
     * `new BatchResponsePublicWideStatusBulkResponseWithErrors()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchResponsePublicWideStatusBulkResponseWithErrors::with(
     *   completedAt: ..., results: ..., startedAt: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchResponsePublicWideStatusBulkResponseWithErrors)
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
     * @param list<PublicWideStatusBulkResponse|PublicWideStatusBulkResponseShape> $results
     * @param Status|value-of<Status> $status
     * @param list<StandardError|StandardErrorShape>|null $errors
     * @param array<string,string>|null $links
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
     * The date and time when the operation was completed.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $self = clone $this;
        $self['completedAt'] = $completedAt;

        return $self;
    }

    /**
     * An array containing the results of the operation.
     *
     * @param list<PublicWideStatusBulkResponse|PublicWideStatusBulkResponseShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * The date and time when the operation started.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }

    /**
     * The current status of the operation, which can be PENDING, PROCESSING, CANCELED, or COMPLETE.
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
     * An array of error objects detailing any issues encountered during the operation.
     *
     * @param list<StandardError|StandardErrorShape> $errors
     */
    public function withErrors(array $errors): self
    {
        $self = clone $this;
        $self['errors'] = $errors;

        return $self;
    }

    /**
     * An object containing related links, where each key is a link name and each value is a URL.
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
     * The number of errors encountered during the operation.
     */
    public function withNumErrors(int $numErrors): self
    {
        $self = clone $this;
        $self['numErrors'] = $numErrors;

        return $self;
    }

    /**
     * The date and time when the operation was requested.
     */
    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $self = clone $this;
        $self['requestedAt'] = $requestedAt;

        return $self;
    }
}
