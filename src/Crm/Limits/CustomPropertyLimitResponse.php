<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Limits;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type CustomPropertyLimitResponseShape = array{
 *   byObjectType: list<LimitAndUsageForObjectType>,
 *   overallLimit: int,
 *   overallPercentage: float,
 *   overallUsage: int,
 * }
 */
final class CustomPropertyLimitResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<CustomPropertyLimitResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<LimitAndUsageForObjectType> $byObjectType */
    #[Api(list: LimitAndUsageForObjectType::class)]
    public array $byObjectType;

    /**
     * The total limit for custom properties across all objects.
     */
    #[Api]
    public int $overallLimit;

    /**
     * The percentage of the overall custom property limit that has been used.
     */
    #[Api]
    public float $overallPercentage;

    /**
     * The total number of custom properties currently in use across all objects.
     */
    #[Api]
    public int $overallUsage;

    /**
     * `new CustomPropertyLimitResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomPropertyLimitResponse::with(
     *   byObjectType: ...,
     *   overallLimit: ...,
     *   overallPercentage: ...,
     *   overallUsage: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomPropertyLimitResponse)
     *   ->withByObjectType(...)
     *   ->withOverallLimit(...)
     *   ->withOverallPercentage(...)
     *   ->withOverallUsage(...)
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
     * @param list<LimitAndUsageForObjectType> $byObjectType
     */
    public static function with(
        array $byObjectType,
        int $overallLimit,
        float $overallPercentage,
        int $overallUsage,
    ): self {
        $obj = new self;

        $obj->byObjectType = $byObjectType;
        $obj->overallLimit = $overallLimit;
        $obj->overallPercentage = $overallPercentage;
        $obj->overallUsage = $overallUsage;

        return $obj;
    }

    /**
     * @param list<LimitAndUsageForObjectType> $byObjectType
     */
    public function withByObjectType(array $byObjectType): self
    {
        $obj = clone $this;
        $obj->byObjectType = $byObjectType;

        return $obj;
    }

    /**
     * The total limit for custom properties across all objects.
     */
    public function withOverallLimit(int $overallLimit): self
    {
        $obj = clone $this;
        $obj->overallLimit = $overallLimit;

        return $obj;
    }

    /**
     * The percentage of the overall custom property limit that has been used.
     */
    public function withOverallPercentage(float $overallPercentage): self
    {
        $obj = clone $this;
        $obj->overallPercentage = $overallPercentage;

        return $obj;
    }

    /**
     * The total number of custom properties currently in use across all objects.
     */
    public function withOverallUsage(int $overallUsage): self
    {
        $obj = clone $this;
        $obj->overallUsage = $overallUsage;

        return $obj;
    }
}
