<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicSequenceStepResponseShape = array{
 *   id: string,
 *   actionType: string,
 *   createdAt: \DateTimeInterface,
 *   delayMillis: int,
 *   stepOrder: int,
 *   updatedAt: \DateTimeInterface,
 *   emailPattern?: PublicEmailPatternResponse|null,
 *   taskPattern?: PublicTaskPatternResponse|null,
 * }
 */
final class PublicSequenceStepResponse implements BaseModel
{
    /** @use SdkModel<PublicSequenceStepResponseShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public string $actionType;

    #[Required]
    public \DateTimeInterface $createdAt;

    #[Required]
    public int $delayMillis;

    #[Required]
    public int $stepOrder;

    #[Required]
    public \DateTimeInterface $updatedAt;

    #[Optional]
    public ?PublicEmailPatternResponse $emailPattern;

    #[Optional]
    public ?PublicTaskPatternResponse $taskPattern;

    /**
     * `new PublicSequenceStepResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicSequenceStepResponse::with(
     *   id: ...,
     *   actionType: ...,
     *   createdAt: ...,
     *   delayMillis: ...,
     *   stepOrder: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicSequenceStepResponse)
     *   ->withID(...)
     *   ->withActionType(...)
     *   ->withCreatedAt(...)
     *   ->withDelayMillis(...)
     *   ->withStepOrder(...)
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
     * @param PublicEmailPatternResponse|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   templateID: string,
     *   updatedAt: \DateTimeInterface,
     *   threadEmailToStepOrder?: int|null,
     * } $emailPattern
     * @param PublicTaskPatternResponse|array{
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
     * } $taskPattern
     */
    public static function with(
        string $id,
        string $actionType,
        \DateTimeInterface $createdAt,
        int $delayMillis,
        int $stepOrder,
        \DateTimeInterface $updatedAt,
        PublicEmailPatternResponse|array|null $emailPattern = null,
        PublicTaskPatternResponse|array|null $taskPattern = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['actionType'] = $actionType;
        $self['createdAt'] = $createdAt;
        $self['delayMillis'] = $delayMillis;
        $self['stepOrder'] = $stepOrder;
        $self['updatedAt'] = $updatedAt;

        null !== $emailPattern && $self['emailPattern'] = $emailPattern;
        null !== $taskPattern && $self['taskPattern'] = $taskPattern;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withActionType(string $actionType): self
    {
        $self = clone $this;
        $self['actionType'] = $actionType;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withDelayMillis(int $delayMillis): self
    {
        $self = clone $this;
        $self['delayMillis'] = $delayMillis;

        return $self;
    }

    public function withStepOrder(int $stepOrder): self
    {
        $self = clone $this;
        $self['stepOrder'] = $stepOrder;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * @param PublicEmailPatternResponse|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   templateID: string,
     *   updatedAt: \DateTimeInterface,
     *   threadEmailToStepOrder?: int|null,
     * } $emailPattern
     */
    public function withEmailPattern(
        PublicEmailPatternResponse|array $emailPattern
    ): self {
        $self = clone $this;
        $self['emailPattern'] = $emailPattern;

        return $self;
    }

    /**
     * @param PublicTaskPatternResponse|array{
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
     * } $taskPattern
     */
    public function withTaskPattern(
        PublicTaskPatternResponse|array $taskPattern
    ): self {
        $self = clone $this;
        $self['taskPattern'] = $taskPattern;

        return $self;
    }
}
