<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Automation\Sequences\PublicSequenceStepDependencyResponse\DependencyType;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicSequenceStepDependencyResponseShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   dependencyType: DependencyType|value-of<DependencyType>,
 *   reliesOnSequenceStepID: string,
 *   reliesOnStepOrder: int,
 *   requiredBySequenceStepID: string,
 *   requiredByStepOrder: int,
 *   updatedAt: \DateTimeInterface,
 * }
 */
final class PublicSequenceStepDependencyResponse implements BaseModel
{
    /** @use SdkModel<PublicSequenceStepDependencyResponseShape> */
    use SdkModel;

    /**
     * The unique identifier of the step dependency.
     */
    #[Required]
    public string $id;

    /**
     * The date and time when the step dependency was created.
     */
    #[Required]
    public \DateTimeInterface $createdAt;

    /**
     * The type of dependency between sequence steps with accepted values being TASK_COMPLETION or MANUAL_PAUSE.
     *
     * @var value-of<DependencyType> $dependencyType
     */
    #[Required(enum: DependencyType::class)]
    public string $dependencyType;

    /**
     * The unique identifier of the sequence step that is responsible for creating and resolving this dependency.
     */
    #[Required('reliesOnSequenceStepId')]
    public string $reliesOnSequenceStepID;

    /**
     * The order number of the step that is responsible for creating and resolving this dependency.
     */
    #[Required]
    public int $reliesOnStepOrder;

    /**
     * The unique identifier of the sequence step that requires this dependency.
     */
    #[Required('requiredBySequenceStepId')]
    public string $requiredBySequenceStepID;

    /**
     * The order number of the step that requires this dependency.
     */
    #[Required]
    public int $requiredByStepOrder;

    /**
     * The date and time when the step dependency was last updated.
     */
    #[Required]
    public \DateTimeInterface $updatedAt;

    /**
     * `new PublicSequenceStepDependencyResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicSequenceStepDependencyResponse::with(
     *   id: ...,
     *   createdAt: ...,
     *   dependencyType: ...,
     *   reliesOnSequenceStepID: ...,
     *   reliesOnStepOrder: ...,
     *   requiredBySequenceStepID: ...,
     *   requiredByStepOrder: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicSequenceStepDependencyResponse)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withDependencyType(...)
     *   ->withReliesOnSequenceStepID(...)
     *   ->withReliesOnStepOrder(...)
     *   ->withRequiredBySequenceStepID(...)
     *   ->withRequiredByStepOrder(...)
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
     * @param DependencyType|value-of<DependencyType> $dependencyType
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        DependencyType|string $dependencyType,
        string $reliesOnSequenceStepID,
        int $reliesOnStepOrder,
        string $requiredBySequenceStepID,
        int $requiredByStepOrder,
        \DateTimeInterface $updatedAt,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['dependencyType'] = $dependencyType;
        $self['reliesOnSequenceStepID'] = $reliesOnSequenceStepID;
        $self['reliesOnStepOrder'] = $reliesOnStepOrder;
        $self['requiredBySequenceStepID'] = $requiredBySequenceStepID;
        $self['requiredByStepOrder'] = $requiredByStepOrder;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The unique identifier of the step dependency.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The date and time when the step dependency was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The type of dependency between sequence steps with accepted values being TASK_COMPLETION or MANUAL_PAUSE.
     *
     * @param DependencyType|value-of<DependencyType> $dependencyType
     */
    public function withDependencyType(
        DependencyType|string $dependencyType
    ): self {
        $self = clone $this;
        $self['dependencyType'] = $dependencyType;

        return $self;
    }

    /**
     * The unique identifier of the sequence step that is responsible for creating and resolving this dependency.
     */
    public function withReliesOnSequenceStepID(
        string $reliesOnSequenceStepID
    ): self {
        $self = clone $this;
        $self['reliesOnSequenceStepID'] = $reliesOnSequenceStepID;

        return $self;
    }

    /**
     * The order number of the step that is responsible for creating and resolving this dependency.
     */
    public function withReliesOnStepOrder(int $reliesOnStepOrder): self
    {
        $self = clone $this;
        $self['reliesOnStepOrder'] = $reliesOnStepOrder;

        return $self;
    }

    /**
     * The unique identifier of the sequence step that requires this dependency.
     */
    public function withRequiredBySequenceStepID(
        string $requiredBySequenceStepID
    ): self {
        $self = clone $this;
        $self['requiredBySequenceStepID'] = $requiredBySequenceStepID;

        return $self;
    }

    /**
     * The order number of the step that requires this dependency.
     */
    public function withRequiredByStepOrder(int $requiredByStepOrder): self
    {
        $self = clone $this;
        $self['requiredByStepOrder'] = $requiredByStepOrder;

        return $self;
    }

    /**
     * The date and time when the step dependency was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
