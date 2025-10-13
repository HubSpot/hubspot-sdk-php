<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Files\FolderActionResponse\Status;
use HubspotSDK\StandardError;

/**
 * @phpstan-type folder_action_response = array{
 *   completedAt: \DateTimeInterface,
 *   startedAt: \DateTimeInterface,
 *   status: value-of<Status>,
 *   taskID: string,
 *   errors?: list<StandardError>,
 *   links?: array<string, string>,
 *   numErrors?: int,
 *   requestedAt?: \DateTimeInterface,
 *   result?: Folder,
 * }
 */
final class FolderActionResponse implements BaseModel
{
    /** @use SdkModel<folder_action_response> */
    use SdkModel;

    /**
     * When the requested changes have been completed.
     */
    #[Api]
    public \DateTimeInterface $completedAt;

    /**
     * Timestamp representing when the task was started at.
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
     * ID of the task.
     */
    #[Api('taskId')]
    public string $taskID;

    /**
     * Detailed errors resulting from the task.
     *
     * @var list<StandardError>|null $errors
     */
    #[Api(list: StandardError::class, optional: true)]
    public ?array $errors;

    /**
     * Link to check the status of the task.
     *
     * @var array<string, string>|null $links
     */
    #[Api(map: 'string', optional: true)]
    public ?array $links;

    /**
     * Number of errors resulting from the requested changes.
     */
    #[Api(optional: true)]
    public ?int $numErrors;

    /**
     * Timestamp representing when the task was requested.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $requestedAt;

    #[Api(optional: true)]
    public ?Folder $result;

    /**
     * `new FolderActionResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FolderActionResponse::with(
     *   completedAt: ..., startedAt: ..., status: ..., taskID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FolderActionResponse)
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
     * @param array<string, string> $links
     */
    public static function with(
        \DateTimeInterface $completedAt,
        \DateTimeInterface $startedAt,
        Status|string $status,
        string $taskID,
        ?array $errors = null,
        ?array $links = null,
        ?int $numErrors = null,
        ?\DateTimeInterface $requestedAt = null,
        ?Folder $result = null,
    ): self {
        $obj = new self;

        $obj->completedAt = $completedAt;
        $obj->startedAt = $startedAt;
        $obj['status'] = $status;
        $obj->taskID = $taskID;

        null !== $errors && $obj->errors = $errors;
        null !== $links && $obj->links = $links;
        null !== $numErrors && $obj->numErrors = $numErrors;
        null !== $requestedAt && $obj->requestedAt = $requestedAt;
        null !== $result && $obj->result = $result;

        return $obj;
    }

    /**
     * When the requested changes have been completed.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $obj = clone $this;
        $obj->completedAt = $completedAt;

        return $obj;
    }

    /**
     * Timestamp representing when the task was started at.
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
     * ID of the task.
     */
    public function withTaskID(string $taskID): self
    {
        $obj = clone $this;
        $obj->taskID = $taskID;

        return $obj;
    }

    /**
     * Detailed errors resulting from the task.
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
     * Link to check the status of the task.
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
     * Number of errors resulting from the requested changes.
     */
    public function withNumErrors(int $numErrors): self
    {
        $obj = clone $this;
        $obj->numErrors = $numErrors;

        return $obj;
    }

    /**
     * Timestamp representing when the task was requested.
     */
    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $obj = clone $this;
        $obj->requestedAt = $requestedAt;

        return $obj;
    }

    public function withResult(Folder $result): self
    {
        $obj = clone $this;
        $obj->result = $result;

        return $obj;
    }
}
