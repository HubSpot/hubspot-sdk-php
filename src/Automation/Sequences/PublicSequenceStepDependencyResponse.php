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
        $obj = new self;

        $obj['id'] = $id;
        $obj['createdAt'] = $createdAt;
        $obj['dependencyType'] = $dependencyType;
        $obj['reliesOnSequenceStepID'] = $reliesOnSequenceStepID;
        $obj['reliesOnStepOrder'] = $reliesOnStepOrder;
        $obj['requiredBySequenceStepID'] = $requiredBySequenceStepID;
        $obj['requiredByStepOrder'] = $requiredByStepOrder;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    public function withDependencyType(string $dependencyType): self
    {
        $obj = clone $this;
        $obj['dependencyType'] = $dependencyType;

        return $obj;
    }

    public function withReliesOnSequenceStepID(
        string $reliesOnSequenceStepID
    ): self {
        $obj = clone $this;
        $obj['reliesOnSequenceStepID'] = $reliesOnSequenceStepID;

        return $obj;
    }

    public function withReliesOnStepOrder(int $reliesOnStepOrder): self
    {
        $obj = clone $this;
        $obj['reliesOnStepOrder'] = $reliesOnStepOrder;

        return $obj;
    }

    public function withRequiredBySequenceStepID(
        string $requiredBySequenceStepID
    ): self {
        $obj = clone $this;
        $obj['requiredBySequenceStepID'] = $requiredBySequenceStepID;

        return $obj;
    }

    public function withRequiredByStepOrder(int $requiredByStepOrder): self
    {
        $obj = clone $this;
        $obj['requiredByStepOrder'] = $requiredByStepOrder;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
