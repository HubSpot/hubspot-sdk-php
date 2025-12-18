<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Files\FileActionResponse\Status;
use HubspotSDK\StandardError;

/**
 * @phpstan-import-type StandardErrorShape from \HubspotSDK\StandardError
 * @phpstan-import-type FileShape from \HubspotSDK\Files\File
 *
 * @phpstan-type FileActionResponseShape = array{
 *   completedAt: \DateTimeInterface,
 *   startedAt: \DateTimeInterface,
 *   status: Status|value-of<Status>,
 *   taskID: string,
 *   errors?: list<StandardErrorShape>|null,
 *   links?: array<string,string>|null,
 *   numErrors?: int|null,
 *   requestedAt?: \DateTimeInterface|null,
 *   result?: null|File|FileShape,
 * }
 */
final class FileActionResponse implements BaseModel
{
    /** @use SdkModel<FileActionResponseShape> */
    use SdkModel;

    /**
     * Time of completion of task.
     */
    #[Required]
    public \DateTimeInterface $completedAt;

    /**
     * Timestamp of when the task was started.
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
     * ID of the requested task.
     */
    #[Required('taskId')]
    public string $taskID;

    /**
     * Descriptive error messages.
     *
     * @var list<StandardError>|null $errors
     */
    #[Optional(list: StandardError::class)]
    public ?array $errors;

    /**
     * Link to check the status of the requested task.
     *
     * @var array<string,string>|null $links
     */
    #[Optional(map: 'string')]
    public ?array $links;

    /**
     * Number of errors resulting from the task.
     */
    #[Optional]
    public ?int $numErrors;

    /**
     * Timestamp of when the task was requested.
     */
    #[Optional]
    public ?\DateTimeInterface $requestedAt;

    /**
     * File.
     */
    #[Optional]
    public ?File $result;

    /**
     * `new FileActionResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FileActionResponse::with(
     *   completedAt: ..., startedAt: ..., status: ..., taskID: ...
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
     * @param list<StandardErrorShape>|null $errors
     * @param array<string,string>|null $links
     * @param File|FileShape|null $result
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
        File|array|null $result = null,
    ): self {
        $self = new self;

        $self['completedAt'] = $completedAt;
        $self['startedAt'] = $startedAt;
        $self['status'] = $status;
        $self['taskID'] = $taskID;

        null !== $errors && $self['errors'] = $errors;
        null !== $links && $self['links'] = $links;
        null !== $numErrors && $self['numErrors'] = $numErrors;
        null !== $requestedAt && $self['requestedAt'] = $requestedAt;
        null !== $result && $self['result'] = $result;

        return $self;
    }

    /**
     * Time of completion of task.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $self = clone $this;
        $self['completedAt'] = $completedAt;

        return $self;
    }

    /**
     * Timestamp of when the task was started.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }

    /**
     * Current status of the task.
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
     * ID of the requested task.
     */
    public function withTaskID(string $taskID): self
    {
        $self = clone $this;
        $self['taskID'] = $taskID;

        return $self;
    }

    /**
     * Descriptive error messages.
     *
     * @param list<StandardErrorShape> $errors
     */
    public function withErrors(array $errors): self
    {
        $self = clone $this;
        $self['errors'] = $errors;

        return $self;
    }

    /**
     * Link to check the status of the requested task.
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
     * Number of errors resulting from the task.
     */
    public function withNumErrors(int $numErrors): self
    {
        $self = clone $this;
        $self['numErrors'] = $numErrors;

        return $self;
    }

    /**
     * Timestamp of when the task was requested.
     */
    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $self = clone $this;
        $self['requestedAt'] = $requestedAt;

        return $self;
    }

    /**
     * File.
     *
     * @param File|FileShape $result
     */
    public function withResult(File|array $result): self
    {
        $self = clone $this;
        $self['result'] = $result;

        return $self;
    }
}
