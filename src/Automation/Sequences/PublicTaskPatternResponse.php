<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_task_pattern_response = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   taskPriority: string,
 *   taskType: string,
 *   updatedAt: \DateTimeInterface,
 *   notes?: string,
 *   queueID?: int,
 *   subject?: string,
 *   templateID?: int,
 *   threadEmailToStepOrder?: int,
 * }
 */
final class PublicTaskPatternResponse implements BaseModel
{
    /** @use SdkModel<public_task_pattern_response> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public \DateTimeInterface $createdAt;

    #[Api]
    public string $taskPriority;

    #[Api]
    public string $taskType;

    #[Api]
    public \DateTimeInterface $updatedAt;

    #[Api(optional: true)]
    public ?string $notes;

    #[Api('queueId', optional: true)]
    public ?int $queueID;

    #[Api(optional: true)]
    public ?string $subject;

    #[Api('templateId', optional: true)]
    public ?int $templateID;

    #[Api(optional: true)]
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
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        string $taskPriority,
        string $taskType,
        \DateTimeInterface $updatedAt,
        ?string $notes = null,
        ?int $queueID = null,
        ?string $subject = null,
        ?int $templateID = null,
        ?int $threadEmailToStepOrder = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->createdAt = $createdAt;
        $obj->taskPriority = $taskPriority;
        $obj->taskType = $taskType;
        $obj->updatedAt = $updatedAt;

        null !== $notes && $obj->notes = $notes;
        null !== $queueID && $obj->queueID = $queueID;
        null !== $subject && $obj->subject = $subject;
        null !== $templateID && $obj->templateID = $templateID;
        null !== $threadEmailToStepOrder && $obj->threadEmailToStepOrder = $threadEmailToStepOrder;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withTaskPriority(string $taskPriority): self
    {
        $obj = clone $this;
        $obj->taskPriority = $taskPriority;

        return $obj;
    }

    public function withTaskType(string $taskType): self
    {
        $obj = clone $this;
        $obj->taskType = $taskType;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withNotes(string $notes): self
    {
        $obj = clone $this;
        $obj->notes = $notes;

        return $obj;
    }

    public function withQueueID(int $queueID): self
    {
        $obj = clone $this;
        $obj->queueID = $queueID;

        return $obj;
    }

    public function withSubject(string $subject): self
    {
        $obj = clone $this;
        $obj->subject = $subject;

        return $obj;
    }

    public function withTemplateID(int $templateID): self
    {
        $obj = clone $this;
        $obj->templateID = $templateID;

        return $obj;
    }

    public function withThreadEmailToStepOrder(
        int $threadEmailToStepOrder
    ): self {
        $obj = clone $this;
        $obj->threadEmailToStepOrder = $threadEmailToStepOrder;

        return $obj;
    }
}
