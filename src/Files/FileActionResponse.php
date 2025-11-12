<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Files\FileActionResponse\Status;
use HubspotSDK\StandardError;

/**
 * @phpstan-type FileActionResponseShape = array{
 *   completedAt: \DateTimeInterface,
 *   startedAt: \DateTimeInterface,
 *   status: value-of<Status>,
 *   taskId: string,
 *   errors?: list<StandardError>|null,
 *   links?: array<string,string>|null,
 *   numErrors?: int|null,
 *   requestedAt?: \DateTimeInterface|null,
 *   result?: File|null,
 * }
 */
final class FileActionResponse implements BaseModel
{
    /** @use SdkModel<FileActionResponseShape> */
    use SdkModel;

    /**
     * Time of completion of task.
     */
    #[Api]
    public \DateTimeInterface $completedAt;

    /**
     * Timestamp of when the task was started.
     */
    #[Api]
    public \DateTimeInterface $startedAt;

    /**
     * Current status of the task.
     *
     * @var value-of<Status> $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    /**
     * ID of the requested task.
     */
    #[Api]
    public string $taskId;

    /**
     * Descriptive error messages.
     *
     * @var list<StandardError>|null $errors
     */
    #[Api(list: StandardError::class, optional: true)]
    public ?array $errors;

    /**
     * Link to check the status of the requested task.
     *
     * @var array<string,string>|null $links
     */
    #[Api(map: 'string', optional: true)]
    public ?array $links;

    /**
     * Number of errors resulting from the task.
     */
    #[Api(optional: true)]
    public ?int $numErrors;

    /**
     * Timestamp of when the task was requested.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $requestedAt;

    /**
     * File.
     */
    #[Api(optional: true)]
    public ?File $result;

    /**
     * `new FileActionResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FileActionResponse::with(
     *   completedAt: ..., startedAt: ..., status: ..., taskId: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FileActionResponse)
     *   ->withCompletedAt(...)
     *   ->withStartedAt(...)
     *   ->withStatus(...)
     *   ->withTaskID(...)
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
     * @param list<StandardError> $errors
     * @param array<string,string> $links
     */
    public static function with(
        \DateTimeInterface $completedAt,
        \DateTimeInterface $startedAt,
        Status|string $status,
        string $taskId,
        ?array $errors = null,
        ?array $links = null,
        ?int $numErrors = null,
        ?\DateTimeInterface $requestedAt = null,
        ?File $result = null,
    ): self {
        $obj = new self;

        $obj->completedAt = $completedAt;
        $obj->startedAt = $startedAt;
        $obj['status'] = $status;
        $obj->taskId = $taskId;

        null !== $errors && $obj->errors = $errors;
        null !== $links && $obj->links = $links;
        null !== $numErrors && $obj->numErrors = $numErrors;
        null !== $requestedAt && $obj->requestedAt = $requestedAt;
        null !== $result && $obj->result = $result;

        return $obj;
    }

    /**
     * Time of completion of task.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $obj = clone $this;
        $obj->completedAt = $completedAt;

        return $obj;
    }

    /**
     * Timestamp of when the task was started.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $obj = clone $this;
        $obj->startedAt = $startedAt;

        return $obj;
    }

    /**
     * Current status of the task.
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
     * ID of the requested task.
     */
    public function withTaskID(string $taskID): self
    {
        $obj = clone $this;
        $obj->taskId = $taskID;

        return $obj;
    }

    /**
     * Descriptive error messages.
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
     * Link to check the status of the requested task.
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
     * Number of errors resulting from the task.
     */
    public function withNumErrors(int $numErrors): self
    {
        $obj = clone $this;
        $obj->numErrors = $numErrors;

        return $obj;
    }

    /**
     * Timestamp of when the task was requested.
     */
    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $obj = clone $this;
        $obj->requestedAt = $requestedAt;

        return $obj;
    }

    /**
     * File.
     */
    public function withResult(File $result): self
    {
        $obj = clone $this;
        $obj->result = $result;

        return $obj;
    }
}
