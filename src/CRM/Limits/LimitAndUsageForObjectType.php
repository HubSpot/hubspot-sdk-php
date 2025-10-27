<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Limits;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type limit_and_usage_for_object_type = array{
 *   limit: int,
 *   objectTypeID: string,
 *   percentage: float,
 *   pluralLabel: string,
 *   singularLabel: string,
 *   usage: int,
 * }
 */
final class LimitAndUsageForObjectType implements BaseModel
{
    /** @use SdkModel<limit_and_usage_for_object_type> */
    use SdkModel;

    #[Api]
    public int $limit;

    #[Api('objectTypeId')]
    public string $objectTypeID;

    #[Api]
    public float $percentage;

    #[Api]
    public string $pluralLabel;

    #[Api]
    public string $singularLabel;

    #[Api]
    public int $usage;

    /**
     * `new LimitAndUsageForObjectType()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LimitAndUsageForObjectType::with(
     *   limit: ...,
     *   objectTypeID: ...,
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
        string $objectTypeID,
        float $percentage,
        string $pluralLabel,
        string $singularLabel,
        int $usage,
    ): self {
        $obj = new self;

        $obj->limit = $limit;
        $obj->objectTypeID = $objectTypeID;
        $obj->percentage = $percentage;
        $obj->pluralLabel = $pluralLabel;
        $obj->singularLabel = $singularLabel;
        $obj->usage = $usage;

        return $obj;
    }

    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj->objectTypeID = $objectTypeID;

        return $obj;
    }

    public function withPercentage(float $percentage): self
    {
        $obj = clone $this;
        $obj->percentage = $percentage;

        return $obj;
    }

    public function withPluralLabel(string $pluralLabel): self
    {
        $obj = clone $this;
        $obj->pluralLabel = $pluralLabel;

        return $obj;
    }

    public function withSingularLabel(string $singularLabel): self
    {
        $obj = clone $this;
        $obj->singularLabel = $singularLabel;

        return $obj;
    }

    public function withUsage(int $usage): self
    {
        $obj = clone $this;
        $obj->usage = $usage;

        return $obj;
    }
}
