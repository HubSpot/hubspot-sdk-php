<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicSequenceStepDependencyResponseShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   dependencyType: string,
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

    #[Required]
    public string $id;

    #[Required]
    public \DateTimeInterface $createdAt;

    #[Required]
    public string $dependencyType;

    #[Required('reliesOnSequenceStepId')]
    public string $reliesOnSequenceStepID;

    #[Required]
    public int $reliesOnStepOrder;

    #[Required('requiredBySequenceStepId')]
    public string $requiredBySequenceStepID;

    #[Required]
    public int $requiredByStepOrder;

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
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        string $dependencyType,
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

    public function withDependencyType(string $dependencyType): self
    {
        $self = clone $this;
        $self['dependencyType'] = $dependencyType;

        return $self;
    }

    public function withReliesOnSequenceStepID(
        string $reliesOnSequenceStepID
    ): self {
        $self = clone $this;
        $self['reliesOnSequenceStepID'] = $reliesOnSequenceStepID;

        return $self;
    }

    public function withReliesOnStepOrder(int $reliesOnStepOrder): self
    {
        $self = clone $this;
        $self['reliesOnStepOrder'] = $reliesOnStepOrder;

        return $self;
    }

    public function withRequiredBySequenceStepID(
        string $requiredBySequenceStepID
    ): self {
        $self = clone $this;
        $self['requiredBySequenceStepID'] = $requiredBySequenceStepID;

        return $self;
    }

    public function withRequiredByStepOrder(int $requiredByStepOrder): self
    {
        $self = clone $this;
        $self['requiredByStepOrder'] = $requiredByStepOrder;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
