<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Automation\Sequences\PublicSequenceStepResponse\ActionType;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicEmailPatternResponseShape from \HubspotSDK\Automation\Sequences\PublicEmailPatternResponse
 * @phpstan-import-type PublicTaskPatternResponseShape from \HubspotSDK\Automation\Sequences\PublicTaskPatternResponse
 *
 * @phpstan-type PublicSequenceStepResponseShape = array{
 *   id: string,
 *   actionType: ActionType|value-of<ActionType>,
 *   createdAt: \DateTimeInterface,
 *   delayMillis: int,
 *   stepOrder: int,
 *   updatedAt: \DateTimeInterface,
 *   emailPattern?: null|PublicEmailPatternResponse|PublicEmailPatternResponseShape,
 *   taskPattern?: null|PublicTaskPatternResponse|PublicTaskPatternResponseShape,
 * }
 */
final class PublicSequenceStepResponse implements BaseModel
{
    /** @use SdkModel<PublicSequenceStepResponseShape> */
    use SdkModel;

    /**
     * The unique identifier of the sequence step.
     */
    #[Required]
    public string $id;

    /**
     * The type of action to be performed in the sequence step.
     *
     * @var value-of<ActionType> $actionType
     */
    #[Required(enum: ActionType::class)]
    public string $actionType;

    /**
     * The date and time when the sequence step was created.
     */
    #[Required]
    public \DateTimeInterface $createdAt;

    /**
     * The delay in milliseconds before the sequence step is executed.
     */
    #[Required]
    public int $delayMillis;

    /**
     * The order of the step within the sequence.
     */
    #[Required]
    public int $stepOrder;

    /**
     * The date and time when the sequence step was last updated.
     */
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
     * @param ActionType|value-of<ActionType> $actionType
     * @param PublicEmailPatternResponse|PublicEmailPatternResponseShape|null $emailPattern
     * @param PublicTaskPatternResponse|PublicTaskPatternResponseShape|null $taskPattern
     */
    public static function with(
        string $id,
        ActionType|string $actionType,
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

    /**
     * The unique identifier of the sequence step.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The type of action to be performed in the sequence step.
     *
     * @param ActionType|value-of<ActionType> $actionType
     */
    public function withActionType(ActionType|string $actionType): self
    {
        $self = clone $this;
        $self['actionType'] = $actionType;

        return $self;
    }

    /**
     * The date and time when the sequence step was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The delay in milliseconds before the sequence step is executed.
     */
    public function withDelayMillis(int $delayMillis): self
    {
        $self = clone $this;
        $self['delayMillis'] = $delayMillis;

        return $self;
    }

    /**
     * The order of the step within the sequence.
     */
    public function withStepOrder(int $stepOrder): self
    {
        $self = clone $this;
        $self['stepOrder'] = $stepOrder;

        return $self;
    }

    /**
     * The date and time when the sequence step was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * @param PublicEmailPatternResponse|PublicEmailPatternResponseShape $emailPattern
     */
    public function withEmailPattern(
        PublicEmailPatternResponse|array $emailPattern
    ): self {
        $self = clone $this;
        $self['emailPattern'] = $emailPattern;

        return $self;
    }

    /**
     * @param PublicTaskPatternResponse|PublicTaskPatternResponseShape $taskPattern
     */
    public function withTaskPattern(
        PublicTaskPatternResponse|array $taskPattern
    ): self {
        $self = clone $this;
        $self['taskPattern'] = $taskPattern;

        return $self;
    }
}
