<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Exports;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Exports\ActionResponseWithSingleResultUri\Status;
use HubspotSDK\ErrorDetail;
use HubspotSDK\StandardError;

/**
 * @phpstan-type ActionResponseWithSingleResultUriShape = array{
 *   completedAt: \DateTimeInterface,
 *   startedAt: \DateTimeInterface,
 *   status: value-of<Status>,
 *   errors?: list<StandardError>|null,
 *   links?: array<string,string>|null,
 *   numErrors?: int|null,
 *   requestedAt?: \DateTimeInterface|null,
 *   result?: string|null,
 * }
 */
final class ActionResponseWithSingleResultUri implements BaseModel
{
    /** @use SdkModel<ActionResponseWithSingleResultUriShape> */
    use SdkModel;

    /**
     * The timestamp when the export was completed, in ISO 8601 format.
     */
    #[Required]
    public \DateTimeInterface $completedAt;

    /**
     * The timestamp when the export process started, in ISO 8601 format.
     */
    #[Required]
    public \DateTimeInterface $startedAt;

    /**
     * The current status of the export, which can be PENDING, PROCESSING, COMPLETE or CANCELED.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /** @var list<StandardError>|null $errors */
    #[Optional(list: StandardError::class)]
    public ?array $errors;

    /**
     * A collection of related links associated with the export.
     *
     * @var array<string,string>|null $links
     */
    #[Optional(map: 'string')]
    public ?array $links;

    /**
     * The number of errors encountered during the export process.
     */
    #[Optional]
    public ?int $numErrors;

    /**
     * The timestamp when the export request was made, in ISO 8601 format.
     */
    #[Optional]
    public ?\DateTimeInterface $requestedAt;

    /**
     * The URL of the resulting file if the export status is COMPLETE.
     */
    #[Optional]
    public ?string $result;

    /**
     * `new ActionResponseWithSingleResultUri()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionResponseWithSingleResultUri::with(
     *   completedAt: ..., startedAt: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionResponseWithSingleResultUri)
     *   ->withCompletedAt(...)
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
        \DateTimeInterface $startedAt,
        Status|string $status,
        ?array $errors = null,
        ?array $links = null,
        ?int $numErrors = null,
        ?\DateTimeInterface $requestedAt = null,
        ?string $result = null,
    ): self {
        $obj = new self;

        $obj['completedAt'] = $completedAt;
        $obj['startedAt'] = $startedAt;
        $obj['status'] = $status;

        null !== $errors && $obj['errors'] = $errors;
        null !== $links && $obj['links'] = $links;
        null !== $numErrors && $obj['numErrors'] = $numErrors;
        null !== $requestedAt && $obj['requestedAt'] = $requestedAt;
        null !== $result && $obj['result'] = $result;

        return $obj;
    }

    /**
     * The timestamp when the export was completed, in ISO 8601 format.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $obj = clone $this;
        $obj['completedAt'] = $completedAt;

        return $obj;
    }

    /**
     * The timestamp when the export process started, in ISO 8601 format.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $obj = clone $this;
        $obj['startedAt'] = $startedAt;

        return $obj;
    }

    /**
     * The current status of the export, which can be PENDING, PROCESSING, COMPLETE or CANCELED.
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
        $obj = clone $this;
        $obj['errors'] = $errors;

        return $obj;
    }

    /**
     * A collection of related links associated with the export.
     *
     * @param array<string,string> $links
     */
    public function withLinks(array $links): self
    {
        $obj = clone $this;
        $obj['links'] = $links;

        return $obj;
    }

    /**
     * The number of errors encountered during the export process.
     */
    public function withNumErrors(int $numErrors): self
    {
        $obj = clone $this;
        $obj['numErrors'] = $numErrors;

        return $obj;
    }

    /**
     * The timestamp when the export request was made, in ISO 8601 format.
     */
    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $obj = clone $this;
        $obj['requestedAt'] = $requestedAt;

        return $obj;
    }

    /**
     * The URL of the resulting file if the export status is COMPLETE.
     */
    public function withResult(string $result): self
    {
        $obj = clone $this;
        $obj['result'] = $result;

        return $obj;
    }
}
