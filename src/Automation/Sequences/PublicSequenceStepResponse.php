<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_sequence_step_response = array{
 *   id: string,
 *   actionType: string,
 *   createdAt: \DateTimeInterface,
 *   delayMillis: int,
 *   stepOrder: int,
 *   updatedAt: \DateTimeInterface,
 *   emailPattern?: PublicEmailPatternResponse,
 *   taskPattern?: PublicTaskPatternResponse,
 * }
 */
final class PublicSequenceStepResponse implements BaseModel
{
    /** @use SdkModel<public_sequence_step_response> */
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
     */
    public static function with(
        string $id,
        string $actionType,
        \DateTimeInterface $createdAt,
        int $delayMillis,
        int $stepOrder,
        \DateTimeInterface $updatedAt,
        ?PublicEmailPatternResponse $emailPattern = null,
        ?PublicTaskPatternResponse $taskPattern = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->actionType = $actionType;
        $obj->createdAt = $createdAt;
        $obj->delayMillis = $delayMillis;
        $obj->stepOrder = $stepOrder;
        $obj->updatedAt = $updatedAt;

        null !== $emailPattern && $obj->emailPattern = $emailPattern;
        null !== $taskPattern && $obj->taskPattern = $taskPattern;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withActionType(string $actionType): self
    {
        $obj = clone $this;
        $obj->actionType = $actionType;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withDelayMillis(int $delayMillis): self
    {
        $obj = clone $this;
        $obj->delayMillis = $delayMillis;

        return $obj;
    }

    public function withStepOrder(int $stepOrder): self
    {
        $obj = clone $this;
        $obj->stepOrder = $stepOrder;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withEmailPattern(
        PublicEmailPatternResponse $emailPattern
    ): self {
        $obj = clone $this;
        $obj->emailPattern = $emailPattern;

        return $obj;
    }

    public function withTaskPattern(
        PublicTaskPatternResponse $taskPattern
    ): self {
        $obj = clone $this;
        $obj->taskPattern = $taskPattern;

        return $obj;
    }
}
