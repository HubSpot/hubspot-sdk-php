<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Automation\Sequences\PublicTaskPatternResponse\TaskPriority;
use HubspotSDK\Automation\Sequences\PublicTaskPatternResponse\TaskType;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicTaskPatternResponseShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   taskPriority: TaskPriority|value-of<TaskPriority>,
 *   taskType: TaskType|value-of<TaskType>,
 *   updatedAt: \DateTimeInterface,
 *   notes?: string|null,
 *   queueID?: int|null,
 *   subject?: string|null,
 *   templateID?: int|null,
 *   threadEmailToStepOrder?: int|null,
 * }
 */
final class PublicTaskPatternResponse implements BaseModel
{
    /** @use SdkModel<PublicTaskPatternResponseShape> */
    use SdkModel;

    /**
     * The unique identifier for the task pattern.
     */
    #[Required]
    public string $id;

    /**
     * The date and time when the task pattern was created.
     */
    #[Required]
    public \DateTimeInterface $createdAt;

    /**
     * The priority level assigned to the task.
     *
     * @var value-of<TaskPriority> $taskPriority
     */
    #[Required(enum: TaskPriority::class)]
    public string $taskPriority;

    /**
     * The type of task, such as an email or call.
     *
     * @var value-of<TaskType> $taskType
     */
    #[Required(enum: TaskType::class)]
    public string $taskType;

    /**
     * The date and time when the task pattern was last updated.
     */
    #[Required]
    public \DateTimeInterface $updatedAt;

    /**
     * Additional notes or comments associated with the task.
     */
    #[Optional]
    public ?string $notes;

    /**
     * The identifier for the queue associated with the task.
     */
    #[Optional('queueId')]
    public ?int $queueID;

    /**
     * The subject line of the task.
     */
    #[Optional]
    public ?string $subject;

    /**
     * The identifier for the template used in the task.
     */
    #[Optional('templateId')]
    public ?int $templateID;

    /**
     * The order of the step to which the email thread is related.
     */
    #[Optional]
    public ?int $threadEmailToStepOrder;

    /**
     * `new PublicTaskPatternResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicTaskPatternResponse::with(
     *   id: ..., createdAt: ..., taskPriority: ..., taskType: ..., updatedAt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicTaskPatternResponse)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withTaskPriority(...)
     *   ->withTaskType(...)
     *   ->withUpdatedAt(...)
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
     * @param TaskPriority|value-of<TaskPriority> $taskPriority
     * @param TaskType|value-of<TaskType> $taskType
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        TaskPriority|string $taskPriority,
        TaskType|string $taskType,
        \DateTimeInterface $updatedAt,
        ?string $notes = null,
        ?int $queueID = null,
        ?string $subject = null,
        ?int $templateID = null,
        ?int $threadEmailToStepOrder = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['taskPriority'] = $taskPriority;
        $self['taskType'] = $taskType;
        $self['updatedAt'] = $updatedAt;

        null !== $notes && $self['notes'] = $notes;
        null !== $queueID && $self['queueID'] = $queueID;
        null !== $subject && $self['subject'] = $subject;
        null !== $templateID && $self['templateID'] = $templateID;
        null !== $threadEmailToStepOrder && $self['threadEmailToStepOrder'] = $threadEmailToStepOrder;

        return $self;
    }

    /**
     * The unique identifier for the task pattern.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The date and time when the task pattern was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The priority level assigned to the task.
     *
     * @param TaskPriority|value-of<TaskPriority> $taskPriority
     */
    public function withTaskPriority(TaskPriority|string $taskPriority): self
    {
        $self = clone $this;
        $self['taskPriority'] = $taskPriority;

        return $self;
    }

    /**
     * The type of task, such as an email or call.
     *
     * @param TaskType|value-of<TaskType> $taskType
     */
    public function withTaskType(TaskType|string $taskType): self
    {
        $self = clone $this;
        $self['taskType'] = $taskType;

        return $self;
    }

    /**
     * The date and time when the task pattern was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Additional notes or comments associated with the task.
     */
    public function withNotes(string $notes): self
    {
        $self = clone $this;
        $self['notes'] = $notes;

        return $self;
    }

    /**
     * The identifier for the queue associated with the task.
     */
    public function withQueueID(int $queueID): self
    {
        $self = clone $this;
        $self['queueID'] = $queueID;

        return $self;
    }

    /**
     * The subject line of the task.
     */
    public function withSubject(string $subject): self
    {
        $self = clone $this;
        $self['subject'] = $subject;

        return $self;
    }

    /**
     * The identifier for the template used in the task.
     */
    public function withTemplateID(int $templateID): self
    {
        $self = clone $this;
        $self['templateID'] = $templateID;

        return $self;
    }

    /**
     * The order of the step to which the email thread is related.
     */
    public function withThreadEmailToStepOrder(
        int $threadEmailToStepOrder
    ): self {
        $self = clone $this;
        $self['threadEmailToStepOrder'] = $threadEmailToStepOrder;

        return $self;
    }
}
