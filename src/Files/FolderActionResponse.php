<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ErrorDetail;
use HubspotSDK\Files\FolderActionResponse\Status;
use HubspotSDK\StandardError;

/**
 * @phpstan-type FolderActionResponseShape = array{
 *   completedAt: \DateTimeInterface,
 *   startedAt: \DateTimeInterface,
 *   status: value-of<Status>,
 *   taskID: string,
 *   errors?: list<StandardError>|null,
 *   links?: array<string,string>|null,
 *   numErrors?: int|null,
 *   requestedAt?: \DateTimeInterface|null,
 *   result?: Folder|null,
 * }
 */
final class FolderActionResponse implements BaseModel
{
    /** @use SdkModel<FolderActionResponseShape> */
    use SdkModel;

    /**
     * When the requested changes have been completed.
     */
    #[Required]
    public \DateTimeInterface $completedAt;

    /**
     * Timestamp representing when the task was started at.
     */
    #[Required]
    public \DateTimeInterface $startedAt;

    /**
     * Current status of the task.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * ID of the task.
     */
    #[Required('taskId')]
    public string $taskID;

    /**
     * Detailed errors resulting from the task.
     *
     * @var list<StandardError>|null $errors
     */
    #[Optional(list: StandardError::class)]
    public ?array $errors;

    /**
     * Link to check the status of the task.
     *
     * @var array<string,string>|null $links
     */
    #[Optional(map: 'string')]
    public ?array $links;

    /**
     * Number of errors resulting from the requested changes.
     */
    #[Optional]
    public ?int $numErrors;

    /**
     * Timestamp representing when the task was requested.
     */
    #[Optional]
    public ?\DateTimeInterface $requestedAt;

    #[Optional]
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
     * @param Folder|array{
     *   id: string,
     *   archived: bool,
     *   createdAt: \DateTimeInterface,
     *   updatedAt: \DateTimeInterface,
     *   archivedAt?: \DateTimeInterface|null,
     *   name?: string|null,
     *   parentFolderID?: string|null,
     *   path?: string|null,
     * } $result
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
        Folder|array|null $result = null,
    ): self {
        $obj = new self;

        $obj['completedAt'] = $completedAt;
        $obj['startedAt'] = $startedAt;
        $obj['status'] = $status;
        $obj['taskID'] = $taskID;

        null !== $errors && $obj['errors'] = $errors;
        null !== $links && $obj['links'] = $links;
        null !== $numErrors && $obj['numErrors'] = $numErrors;
        null !== $requestedAt && $obj['requestedAt'] = $requestedAt;
        null !== $result && $obj['result'] = $result;

        return $obj;
    }

    /**
     * When the requested changes have been completed.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $obj = clone $this;
        $obj['completedAt'] = $completedAt;

        return $obj;
    }

    /**
     * Timestamp representing when the task was started at.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $obj = clone $this;
        $obj['startedAt'] = $startedAt;

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
        $obj['taskID'] = $taskID;

        return $obj;
    }

    /**
     * Detailed errors resulting from the task.
     *
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
     * Link to check the status of the task.
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
     * Number of errors resulting from the requested changes.
     */
    public function withNumErrors(int $numErrors): self
    {
        $obj = clone $this;
        $obj['numErrors'] = $numErrors;

        return $obj;
    }

    /**
     * Timestamp representing when the task was requested.
     */
    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $obj = clone $this;
        $obj['requestedAt'] = $requestedAt;

        return $obj;
    }

    /**
     * @param Folder|array{
     *   id: string,
     *   archived: bool,
     *   createdAt: \DateTimeInterface,
     *   updatedAt: \DateTimeInterface,
     *   archivedAt?: \DateTimeInterface|null,
     *   name?: string|null,
     *   parentFolderID?: string|null,
     *   path?: string|null,
     * } $result
     */
    public function withResult(Folder|array $result): self
    {
        $obj = clone $this;
        $obj['result'] = $result;

        return $obj;
    }
}
