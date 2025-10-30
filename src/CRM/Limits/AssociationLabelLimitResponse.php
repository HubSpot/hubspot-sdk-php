<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Limits;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Objects\Schemas\ObjectTypeDefinition;

/**
 * @phpstan-type AssociationLabelLimitResponseShape = array{
 *   allLabels: list<string>,
 *   fromObjectType: ObjectTypeDefinition,
 *   limit: int,
 *   percentage: float,
 *   toObjectType: ObjectTypeDefinition,
 *   usage: int,
 * }
 */
final class AssociationLabelLimitResponse implements BaseModel
{
    /** @use SdkModel<AssociationLabelLimitResponseShape> */
    use SdkModel;

    /** @var list<string> $allLabels */
    #[Api(list: 'string')]
    public array $allLabels;

    /**
     * Defines an object type.
     */
    #[Api]
    public ObjectTypeDefinition $fromObjectType;

    #[Api]
    public int $limit;

    #[Api]
    public float $percentage;

    /**
     * Defines an object type.
     */
    #[Api]
    public ObjectTypeDefinition $toObjectType;

    #[Api]
    public int $usage;

    /**
     * `new AssociationLabelLimitResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationLabelLimitResponse::with(
     *   allLabels: ...,
     *   fromObjectType: ...,
     *   limit: ...,
     *   percentage: ...,
     *   toObjectType: ...,
     *   usage: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationLabelLimitResponse)
     *   ->withAllLabels(...)
     *   ->withFromObjectType(...)
     *   ->withLimit(...)
     *   ->withPercentage(...)
     *   ->withToObjectType(...)
     *   ->withUsage(...)
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
     * @param list<string> $allLabels
     */
    public static function with(
        array $allLabels,
        ObjectTypeDefinition $fromObjectType,
        int $limit,
        float $percentage,
        ObjectTypeDefinition $toObjectType,
        int $usage,
    ): self {
        $obj = new self;

        $obj->allLabels = $allLabels;
        $obj->fromObjectType = $fromObjectType;
        $obj->limit = $limit;
        $obj->percentage = $percentage;
        $obj->toObjectType = $toObjectType;
        $obj->usage = $usage;

        return $obj;
    }

    /**
     * @param list<string> $allLabels
     */
    public function withAllLabels(array $allLabels): self
    {
        $obj = clone $this;
        $obj->allLabels = $allLabels;

        return $obj;
    }

    /**
     * Defines an object type.
     */
    public function withFromObjectType(
        ObjectTypeDefinition $fromObjectType
    ): self {
        $obj = clone $this;
        $obj->fromObjectType = $fromObjectType;

        return $obj;
    }

    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    public function withPercentage(float $percentage): self
    {
        $obj = clone $this;
        $obj->percentage = $percentage;

        return $obj;
    }

    /**
     * Defines an object type.
     */
    public function withToObjectType(ObjectTypeDefinition $toObjectType): self
    {
        $obj = clone $this;
        $obj->toObjectType = $toObjectType;

        return $obj;
    }

    public function withUsage(int $usage): self
    {
        $obj = clone $this;
        $obj->usage = $usage;

        return $obj;
    }
}
