<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicTaskPatternResponseShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   taskPriority: string,
 *   taskType: string,
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

    #[Required]
    public string $id;

    #[Required]
    public \DateTimeInterface $createdAt;

    #[Required]
    public string $taskPriority;

    #[Required]
    public string $taskType;

    #[Required]
    public \DateTimeInterface $updatedAt;

    #[Optional]
    public ?string $notes;

    #[Optional('queueId')]
    public ?int $queueID;

    #[Optional]
    public ?string $subject;

    #[Optional('templateId')]
    public ?int $templateID;

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

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withTaskPriority(string $taskPriority): self
    {
        $self = clone $this;
        $self['taskPriority'] = $taskPriority;

        return $self;
    }

    public function withTaskType(string $taskType): self
    {
        $self = clone $this;
        $self['taskType'] = $taskType;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withNotes(string $notes): self
    {
        $self = clone $this;
        $self['notes'] = $notes;

        return $self;
    }

    public function withQueueID(int $queueID): self
    {
        $self = clone $this;
        $self['queueID'] = $queueID;

        return $self;
    }

    public function withSubject(string $subject): self
    {
        $self = clone $this;
        $self['subject'] = $subject;

        return $self;
    }

    public function withTemplateID(int $templateID): self
    {
        $self = clone $this;
        $self['templateID'] = $templateID;

        return $self;
    }

    public function withThreadEmailToStepOrder(
        int $threadEmailToStepOrder
    ): self {
        $self = clone $this;
        $self['threadEmailToStepOrder'] = $threadEmailToStepOrder;

        return $self;
    }
}
