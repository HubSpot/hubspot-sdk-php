<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Limits;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type LimitAndUsageForObjectTypeShape = array{
 *   limit: int,
 *   objectTypeId: string,
 *   percentage: float,
 *   pluralLabel: string,
 *   singularLabel: string,
 *   usage: int,
 * }
 */
final class LimitAndUsageForObjectType implements BaseModel
{
    /** @use SdkModel<LimitAndUsageForObjectTypeShape> */
    use SdkModel;

    /**
     * The maximum allowed count for the object type.
     */
    #[Api]
    public int $limit;

    /**
     * The unique identifier for the object type.
     */
    #[Api]
    public string $objectTypeId;

    /**
     * The percentage of the limit that has been used.
     */
    #[Api]
    public float $percentage;

    /**
     * The plural label for the object type.
     */
    #[Api]
    public string $pluralLabel;

    /**
     * The singular label for the object type.
     */
    #[Api]
    public string $singularLabel;

    /**
     * The current usage count for the object type.
     */
    #[Api]
    public int $usage;

    /**
     * `new LimitAndUsageForObjectType()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LimitAndUsageForObjectType::with(
     *   limit: ...,
     *   objectTypeId: ...,
     *   percentage: ...,
     *   pluralLabel: ...,
     *   singularLabel: ...,
     *   usage: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LimitAndUsageForObjectType)
     *   ->withLimit(...)
     *   ->withObjectTypeID(...)
     *   ->withPercentage(...)
     *   ->withPluralLabel(...)
     *   ->withSingularLabel(...)
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
     */
    public static function with(
        int $limit,
        string $objectTypeId,
        float $percentage,
        string $pluralLabel,
        string $singularLabel,
        int $usage,
    ): self {
        $obj = new self;

        $obj->limit = $limit;
        $obj->objectTypeId = $objectTypeId;
        $obj->percentage = $percentage;
        $obj->pluralLabel = $pluralLabel;
        $obj->singularLabel = $singularLabel;
        $obj->usage = $usage;

        return $obj;
    }

    /**
     * The maximum allowed count for the object type.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    /**
     * The unique identifier for the object type.
     */
    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj->objectTypeId = $objectTypeID;

        return $obj;
    }

    /**
     * The percentage of the limit that has been used.
     */
    public function withPercentage(float $percentage): self
    {
        $obj = clone $this;
        $obj->percentage = $percentage;

        return $obj;
    }

    /**
     * The plural label for the object type.
     */
    public function withPluralLabel(string $pluralLabel): self
    {
        $obj = clone $this;
        $obj->pluralLabel = $pluralLabel;

        return $obj;
    }

    /**
     * The singular label for the object type.
     */
    public function withSingularLabel(string $singularLabel): self
    {
        $obj = clone $this;
        $obj->singularLabel = $singularLabel;

        return $obj;
    }

    /**
     * The current usage count for the object type.
     */
    public function withUsage(int $usage): self
    {
        $obj = clone $this;
        $obj->usage = $usage;

        return $obj;
    }
}
