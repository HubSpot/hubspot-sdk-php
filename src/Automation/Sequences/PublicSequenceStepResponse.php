<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Core\Attributes\Api;
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

    #[Api]
    public string $id;

    #[Api]
    public string $actionType;

    #[Api]
    public \DateTimeInterface $createdAt;

    #[Api]
    public int $delayMillis;

    #[Api]
    public int $stepOrder;

    #[Api]
    public \DateTimeInterface $updatedAt;

    #[Api(optional: true)]
    public ?PublicEmailPatternResponse $emailPattern;

    #[Api(optional: true)]
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
     *   templateId: string,
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
     *   queueId?: int|null,
     *   subject?: string|null,
     *   templateId?: int|null,
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
        $obj = new self;

        $obj['id'] = $id;
        $obj['actionType'] = $actionType;
        $obj['createdAt'] = $createdAt;
        $obj['delayMillis'] = $delayMillis;
        $obj['stepOrder'] = $stepOrder;
        $obj['updatedAt'] = $updatedAt;

        null !== $emailPattern && $obj['emailPattern'] = $emailPattern;
        null !== $taskPattern && $obj['taskPattern'] = $taskPattern;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withActionType(string $actionType): self
    {
        $obj = clone $this;
        $obj['actionType'] = $actionType;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    public function withDelayMillis(int $delayMillis): self
    {
        $obj = clone $this;
        $obj['delayMillis'] = $delayMillis;

        return $obj;
    }

    public function withStepOrder(int $stepOrder): self
    {
        $obj = clone $this;
        $obj['stepOrder'] = $stepOrder;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * @param PublicEmailPatternResponse|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   templateId: string,
     *   updatedAt: \DateTimeInterface,
     *   threadEmailToStepOrder?: int|null,
     * } $emailPattern
     */
    public function withEmailPattern(
        PublicEmailPatternResponse|array $emailPattern
    ): self {
        $obj = clone $this;
        $obj['emailPattern'] = $emailPattern;

        return $obj;
    }

    /**
     * @param PublicTaskPatternResponse|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   taskPriority: string,
     *   taskType: string,
     *   updatedAt: \DateTimeInterface,
     *   notes?: string|null,
     *   queueId?: int|null,
     *   subject?: string|null,
     *   templateId?: int|null,
     *   threadEmailToStepOrder?: int|null,
     * } $taskPattern
     */
    public function withTaskPattern(
        PublicTaskPatternResponse|array $taskPattern
    ): self {
        $obj = clone $this;
        $obj['taskPattern'] = $taskPattern;

        return $obj;
    }
}
